<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleItemStatus extends Component
{
    public Model $model;
    public string $field;
    public bool $active;


    public function mount()
    {
        $this->active = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

        $this->js(
            "swal('Opps!', 'Status updated', 'error')"
        );
    }


    public function render()
    {
        return view('admin.livewire.toggle-item-status');
    }
}
