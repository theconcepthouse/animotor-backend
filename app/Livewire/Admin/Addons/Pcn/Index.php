<?php

namespace App\Livewire\Admin\Addons\Pcn;

use App\Models\Addons\pcn;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';


    #[Computed]
    public array $selected_items = [];

    public bool $selectAll = false;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {

//
//        $data = pcn::where(function ($query) {
//            $query->where('vrm', 'like', '%' . $this->search . '%')
//                ->orWhere('pcn_no', 'like', '%' . $this->search . '%');
//        })->paginate(10);

        $data = $this->getPaginated();

        return view('livewire.admin.addons.pcn.index',[
            'data' => $data,
        ]);
    }

    public function toggleAvailable($itemId)
    {
        $item = Car::findOrFail($itemId);
        $item->update([
            'is_available' => !$item->is_available,
        ]);
        $this->js("NioApp.Toast('Status updated successfully', 'success', {
                                position: 'top-right'
                            });");
    }


    protected function getData()
    {
        return $this->getPaginated();
    }

    protected function getPaginated(){

        $query = pcn::query();

        if (!isOwner() && !isAdmin()) {
            return []; // Return an empty array if neither owner nor admin
        }

        if (!isAdmin()) {
            $booking_ids = auth()->user()?->company?->bookings?->pluck('id');

            $query->whereIn('booking_id', $booking_ids);
        }

        $query->where(function ($query) {
            $query->where('vrm', 'like', '%' . $this->search . '%')
                ->orWhere('pcn_no', 'like', '%' . $this->search . '%');
        });

        return $query->paginate(10);
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
        pcn::whereIn('id', $this->selected_items)->delete();
        $this->selected_items = [];
    }
    public function resetPageData()
    {
        $this->resetPage();
    }

}
