<?php

namespace App\Livewire\Frontend\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;


class CustomerReturn extends Component
{
    public int $step = 14;
    public $any_damage;
    public $damaged_panel = 2;
    public string $damage_type;
    public bool $alloy_wheels_damage;
    public array $alloy_damages = ['scuffed_alloys' => 2, 'worn_tyres' => 2];
    public bool $windscreen_damage;

    public array $windscreen_damages = [
        'Chipped or cracked driver side' => false,
        'Chipped or cracked passenger side' => true,
        'Chipped or cracked rear window' => true,
    ];
    public bool $mirror_damage;
    public array $mirror_damages = [
        'faulty_mirror_electronics' => false,
        'mirror_glass_both_scratch_or_missing' => false,
        'mirror_glass_one_scratch_or_missing' => false,
        'mirror_cover_both_scratch_or_missing' => true,
        'mirror_cover_one_scratch_or_missing' => false,
    ];
    public bool $warning_lights;
    public array $lights_on = [
        'Service due' => true,
        'Oil Warning' => false,
        'Engine Management' => false,
        'Airbag warning' => false,
        'ABS' => false,
    ];
    public bool $seat_damage;
    public array $seat_damages = [
        'Has stains' => true,
        'Has tears' => true,
        'Has burns' => true,
    ];
    public bool $clean_exterior;
    public string $exterior_images = '';
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

    #[On('file-manager-event')]
    public function updateFile($event = null)
    {
        $name = $event['name'];
        $this->$name = $event['file'];
    }

    #[On('file-uploader-clear')]
    public function clearFile($event = null)
    {
        $name = $event;
        $this->$name = '';
    }



    public function mount(){

    }

    public function checkInput(){
        dd($this->exterior_images);
    }

    public function render()
    {
        return view('livewire.frontend.dashboard.customer-return');
    }

    public function paintDamage($val)
    {

        $val == 'yes' ? $this->any_damage = 1 :  $this->any_damage = 0;

        $this->step++;

    }
    public function setExteriorClean($val)
    {

        $val == 'yes' ? $this->clean_exterior = 1 :  $this->clean_exterior = 0;

        $this->step++;

    }
    public function setDamage($val)
    {

        $val == 'yes' ? $this->seat_damage = 1 :  $this->seat_damage = 0;

        $this->step++;

    }
    public function alloyWheelDamage($val)
    {

        $val == 'yes' ? $this->alloy_wheels_damage = 1 :  $this->alloy_wheels_damage = 0;

        $this->step++;

    }
    public function warningLights($val)
    {

        $val == 'yes' ? $this->warning_lights = 1 :  $this->warning_lights = 0;

        $this->step++;

    }
    public function windscreenDamage($val)
    {

        $val == 'yes' ? $this->windscreen_damage = 1 :  $this->windscreen_damage = 0;

        $this->step++;

    }
    public function mirrorDamage($val)
    {

        $val == 'yes' ? $this->mirror_damage = 1 :  $this->mirror_damage = 0;

        $this->step++;

    }
    public function increaseDamaged()
    {
        $this->damaged_panel++;
    }

    public function increaseAllow($item)
    {
        $this->alloy_damages[$item]++;
    }



    public function decreaseAllow($item)
    {
        if($this->alloy_damages[$item] > 1){
            $this->alloy_damages[$item]--;
        }
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
