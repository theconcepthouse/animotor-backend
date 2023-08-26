<?php

namespace App\Livewire\Admin\Addons\Pcn;

use App\Models\Addons\pcn;
use Livewire\Component;

class Show extends Component
{
    public string $id;

    public function render()
    {
        $item = pcn::findOrFail($this->id);
        return view('livewire.admin.addons.pcn.show',['item' => $item]);
    }
}
