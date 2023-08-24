<?php

namespace App\Livewire\Admin\Components;

use Livewire\Component;

class InputWrapper extends Component
{
    public string $name;
    public string $label;

    public function render()
    {
        return view('livewire.admin.components.input-wrapper');
    }
}
