<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;

class Slider extends Component
{
    public array $sliders = [['image' => '', 'is_external_link' => 'yes', 'link' => '#']];

    public function mount()
    {
//        $sliders = settings('mobile_sliders', []);
//
//        $this->sliders[] = json_decode($sliders, true);

        $sliders = settings('mobile_sliders', '');
        $this->sliders = json_decode($sliders, true) ?? $this->sliders;



//        if(strlen($sliders) > 10){
//            $this->sliders[] = json_decode($sliders, true);
//        }

    }
    public function render()
    {
        return view('livewire.admin.settings.slider');
    }

    public function addSlider()
    {
        $this->sliders[] = ['image' => '', 'is_external_link' => true, 'link' => '#'];
    }

    public function removeSlider($index)
    {
        unset($this->sliders[$index]);
        $this->sliders = array_values($this->sliders);
    }

    public function saveSliders()
    {

        $this->validate([
            'sliders.*.image' => ['required', 'string'],
            'sliders.*.link' => ['nullable'],
            'sliders.*.is_external_link' => ['nullable'],
        ]);

//        $sliders = $this->sliders;
        $sliders = json_encode($this->sliders);

        settings()->set('mobile_sliders', $sliders);

        session()->flash('success', 'Sliders saved successfully.');
    }

}
