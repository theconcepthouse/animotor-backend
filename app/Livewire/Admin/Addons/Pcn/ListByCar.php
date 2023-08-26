<?php

namespace App\Livewire\Admin\Addons\Pcn;

use App\Models\Addons\pcn;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ListByCar extends Component
{

    use WithPagination;

    public string $search = '';
    public string $id;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = pcn::where('vrm', $this->id)->where(function ($query) {
            $query->where('pcn_no', 'like', '%' . $this->search . '%');
//                ->orWhere('pcn_no', 'like', '%' . $this->search . '%');
        })->paginate(3);

        return view('livewire.admin.addons.pcn.list-by-car',[
            'data' => $data,
        ]);
    }

    public function resetPageData()
    {
        $this->resetPage();
    }


}
