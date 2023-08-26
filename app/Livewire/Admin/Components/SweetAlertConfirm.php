<?php

namespace App\Livewire\Admin\Components;

use Livewire\Component;

class SweetAlertConfirm extends Component
{
    public $title;
    public $text;
    public $method;
    public $params;

    protected $listeners = ['triggerConfirm'];

    public function triggerConfirm($title, $text, $method, $params = [])
    {
        $this->title = $title;
        $this->text = $text;
        $this->method = $method;
        $this->params = $params;

        $this->dispatchBrowserEvent('openConfirmModal');
    }

    public function confirm()
    {
        $this->emit($this->method, ...$this->params);
    }


    public function render()
    {
        return view('livewire.admin.components.sweet-alert-confirm');
    }
}
