<?php

namespace App\Livewire\Components\Form;

use Livewire\Component;

class Textarea extends Component
{
    public string $label;
    public ?string $custom_class;
    public ?string $placeholder = null;
    public string $value;
    public string $id;

    public function mount($label, $placeholder,  $id, $custom_class = null)
    {
        $this->custom_class = $custom_class;
        $this->label = $label;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('livewire.components.form.textarea');
    }
}
