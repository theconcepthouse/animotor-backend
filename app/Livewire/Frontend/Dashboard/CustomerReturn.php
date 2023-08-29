<?php

namespace App\Livewire\Frontend\Dashboard;

use Livewire\Component;

class CustomerReturn extends Component
{
    public int $step = 1;
    public $any_damage;
    public $damaged_panel = 2;
    public string $damage_type;
    public bool $alloy_wheels_damage;
    public array $alloy_damages = ['Scuffed alloys' => 2, 'Worn tyres' => 2];
    public bool $windscreen_damage;
    public string $windscreen_damages;
    public bool $mirror_damage;
    public string $mirror_damages;
    public bool $warning_lights;
    public string $lights_on;
    public bool $seat_damage;
    public string $seat_damages;
    public bool $clean_exterior;
    public string $exterior_images;
    public bool $handbook;
    public string $handbook_images;
    public string $spare_wheel;

    public array $menu_items = [
        'Paint & bodywork',
        'Wheels & tyres',
        'Windscreens',
        'Mirrors',
        'Dash',
        'Interior',
        'Exterior',
        'Handbook',
        'Spare wheel',
        'Fuel cap',
        'Aerial',
        'Floor mats',
        'Tools'
    ];
    public array $menu_logos = [
        '/assets/img/icons/paint.png',
        '/assets/img/icons/wheel.png',
        '/assets/img/icons/wheel.png',
        '/assets/img/icons/mirror.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/windscreen.png'
    ];



    public function render()
    {
        return view('livewire.frontend.dashboard.customer-return');
    }

    public function paintDamage($val)
    {

        $val == 'yes' ? $this->any_damage = 1 :  $this->any_damage = 0;

        $this->step++;

    }
    public function increaseDamaged()
    {
        $this->damaged_panel++;
    }

    public function decreaseDamaged()
    {
        if($this->damaged_panel > 1){
            $this->damaged_panel--;
        }
    }

    public function next()
    {
         $this->step++;
    }

    public function prev(): int
    {
        return $this->step > 1 ? $this->step-- : $this->step;
    }

//    public function saveUpdate(){
//        if($this->step == 1){
//            return $this->paintDamage();
//        }
//    }

    public function setStep($val){
        $this->step = $val;
    }
}
