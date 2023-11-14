<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Notification extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';
    #[Url]
    public $service_type = '';
    #[Url]
    public $service_area = '';
    #[Url]
    public string $status = 'all';

    public string $role = 'rider';
    public string $current_uri;


    #[Computed]
    public array $selected_items = [];

    #[Url]
    public bool $selectAll = false;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = $this->getPaginate();

        return view('livewire.admin.notification',[
            'data' => $data,
        ]);
    }

    public function mount(){
        $this->updatedSelectAll();
    }

//    public function toggleAvailable($itemId)
//    {
//        $item = Car::findOrFail($itemId);
//        $item->update([
//            'is_available' => !$item->is_available,
//        ]);
//        $this->js("NioApp.Toast('Status updated successfully', 'success', {
//                                position: 'top-right'
//                            });");
//    }


    protected function getData()
    {
        return $this->getPaginate();
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selected_items = $this->getData()->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selected_items = [];
        }
    }

    public function deleteSelectedItems()
    {
        User::whereIn('id', $this->selected_items)->delete();
        $this->selected_items = [];

        $this->js("NioApp.Toast('Users successfully deleted', 'success', {
                                position: 'top-right'
                            });");
    }

    public function changeSelectedItemsStatus($status)
    {
        User::whereIn('id', $this->selected_items)->update([
            'status' => $status
        ]);
        $this->selected_items = [];

        $this->dispatch('notify-success', message : 'Users status changed to '.$status);

    }
    public function resetPageData()
    {
        $this->resetPage();
    }


    protected function getPaginate(): \Illuminate\Contracts\Pagination\LengthAwarePaginator|array
    {
        $query = User::whereHasRole([$this->role]);

        if (!isOwner() && !isAdmin()) {
            return [];
        }

        if (!isAdmin()) {
            $query->where('company_id', companyId());
        }

        if($this->status == 'pending'){
            $query->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhere('status','unapproved');
            });
        }

        if($this->status == 'banned'){
            $query->where('status', 'banned');
        }

        if($this->status == 'active'){
            $query->where('status', 'active');
        }

        if($this->status == 'online'){
            $query->where('is_online', true);
        }

        if($this->service_type){
            $query->where('service_id', $this->service_type);
        }

        if($this->service_area){
            $query->where('region_id', $this->service_area);
        }

        $query->where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        });

        return $query->paginate(10);
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function setServiceType($id){
//        if(!$id){
//            $this->reset('service_type');
//        }
        $this->service_type = $id;
    }

    public function setServiceArea($id){
        $this->service_area = $id;
    }


}
