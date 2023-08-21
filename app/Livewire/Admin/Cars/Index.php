<?php

namespace App\Livewire\Admin\Cars;

use App\Models\Car;
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

    public int $carsWithoutRegionCount = 0;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Car::where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('make', 'like', '%' . $this->search . '%')
                ->orWhere('model', 'like', '%' . $this->search . '%');
        })->paginate(10);

        $this->carsWithoutRegionCount = $data->where('region_id', null)->count();

        return view('livewire.admin.cars.index',[
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
        return Car::where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('make', 'like', '%' . $this->search . '%')
                ->orWhere('model', 'like', '%' . $this->search . '%');
        })->paginate(10);
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
        Car::whereIn('id', $this->selected_items)->delete();
        $this->selected_items = [];
    }
    public function resetPageData()
    {
        $this->resetPage();
    }
}
