<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public string $search = '';
    public string $status = 'all';

    public string $role = 'rider';


    #[Computed]
    public array $selected_items = [];

    public bool $selectAll = false;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = $this->getPaginate();

        return view('livewire.admin.user.index',[
            'data' => $data,
        ]);
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

}
