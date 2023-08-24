<?php

namespace App\Livewire\Components\Form;

use Livewire\Component;


class Text extends Component
{
    public string $name;
    public string $label;
    public string $type = 'text';
    public ?string $attr = null;
    public ?bool $is_live = false;


    public function render()
    {
        return view('livewire.components.form.text');
    }
}
