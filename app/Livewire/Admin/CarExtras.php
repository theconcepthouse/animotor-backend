<?php

namespace App\Livewire\Admin;

use App\Models\Car;
use Livewire\Component;

class CarExtras extends Component
{
    public array $extras = ['name' => '', 'amount' => ''];
    public string $carId;
    public string $title;
    public ?string $requirements = null;
    public ?string $security_deposit = null;
    public ?string $damage_excess = null;
    public ?string $mileage_text = null;

    public function mount($extras, $carId = null)
    {
        $car = Car::findOrFail($carId);
//        dd($car->security_deposit);
        $this->extras[] = $extras;
        $this->security_deposit = $car->security_deposit;
        $this->damage_excess = $car->damage_excess;
        $this->requirements = $car->requirements;
        $this->mileage_text = $car->mileage_text;
        $this->carId = $carId;
    }

    public function addExtra()
    {
        $this->extras[] = ['name' => '', 'amount' => ''];
    }

    public function removeExtra($index)
    {
        unset($this->extras[$index]);
        $this->extras = array_values($this->extras);
    }

    public function saveExtras()
    {
        $this->validate([
            'extras.*.title' => ['required', 'string'],
            'extras.*.price' => ['required', 'numeric', 'min:0'],
        ]);

        if ($this->carId) {
            $car = Car::findOrFail($this->carId);
            $car->extras = $this->extras;
            $car->save();
        }

        session()->flash('success', 'Extras saved successfully.');
    }


    public function render()
    {
        return view('livewire.admin.car-extras');
    }
}
