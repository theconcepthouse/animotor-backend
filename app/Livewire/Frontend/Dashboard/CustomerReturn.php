<?php

namespace App\Livewire\Frontend\Dashboard;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\AdvanceRental\Entities\CarDamageReport;


class CustomerReturn extends Component
{
    public int $step = 1;
    public $any_damage;
    public $booking_id;
    public $car_id;
    public $carDamageReport;
    public $return_id;
    public $damaged_panel = 2;
    public $damage_type;
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
    public  $exterior_images = '';
    public  $exterior_description;
    public bool $handbook;
    public  $handbook_images;
    public  $handbook_description;
    public  $spare_wheel;
    public  $spare_wheel_images;
    public  $spare_wheel_description;

    public  $fuel_cap;
    public  $fuel_cap_images;
    public  $fuel_cap_description;

    public  $floor_mat;
    public  $floor_mat_images;
    public  $floor_mat_description;

    public  $aerial;
    public  $aerial_images;
    public  $aerial_description;

    public  $tools;
    public  $tools_images;
    public  $tools_description;

    public $car_damage_report;

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
    public array $menu_index = [
        1,3,5,7,9,11,13,15,17,19,21,23,25
    ];
    public array $menu_logos = [
        '/assets/img/icons/paint.png',
        '/assets/img/icons/wheel.png',
        '/assets/img/icons/windscreen.png',
        '/assets/img/icons/mirror.png',
        '/assets/img/icons/dash.png',
        '/assets/img/icons/interior.png',
        '/assets/img/icons/exterior.png',
        '/assets/img/icons/handbook.png',
        '/assets/img/icons/spare.png',
        '/assets/img/icons/fuel.png',
        '/assets/img/icons/aeriel.png',
        '/assets/img/icons/floor.png',
        '/assets/img/icons/tools.png'
    ];

    #[On('file-manager-event')]
    public function updateFile($event = null)
    {
        $name = $event['name'];
        $this->name = $event['file'];
    }

    #[On('file-uploader-clear')]
    public function clearFile($event = null)
    {
        $name = $event;
        $this->name = '';
    }



    public function mount($carDamageReport){
        if (!$carDamageReport) {
            $carDamageReport = null; // Set it to null if it hasn't been persisted yet.
//            dd('not foud');
        }

        if($carDamageReport){
            $this->carDamageReport = $carDamageReport;
            $this->fill($carDamageReport->toArray());
        }
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

        $val == 'yes' ? $this->step++ : $this->step += 2;

    }
    public function setAerial($val)
    {

        $val == 'yes' ? $this->aerial = 1 :  $this->aerial = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function setFloorMat($val)
    {

        $val == 'yes' ? $this->floor_mat = 1 :  $this->floor_mat = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }

    public function setTools($val)
    {

        $val == 'yes' ? $this->tools = 1 :  $this->tools = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function setExteriorClean($val)
    {

        $val == 'yes' ? $this->clean_exterior = 1 :  $this->clean_exterior = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;

        $this->dispatch('init-lfm');


    }
    public function setFuelCap($val)
    {

        $val == 'yes' ? $this->fuel_cap = 1 :  $this->fuel_cap = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }

    public function setHandbook($val)
    {

        $val == 'yes' ? $this->handbook = 1 :  $this->handbook = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function setSpareWheel($val)
    {

        $val == 'yes' ? $this->spare_wheel = 1 :  $this->spare_wheel = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function setDamage($val)
    {

        $val == 'yes' ? $this->seat_damage = 1 :  $this->seat_damage = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function alloyWheelDamage($val)
    {

        $val == 'yes' ? $this->alloy_wheels_damage = 1 :  $this->alloy_wheels_damage = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function warningLights($val)
    {

        $val == 'yes' ? $this->warning_lights = 1 :  $this->warning_lights = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function windscreenDamage($val)
    {

        $val == 'yes' ? $this->windscreen_damage = 1 :  $this->windscreen_damage = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


    }
    public function mirrorDamage($val)
    {

        $val == 'yes' ? $this->mirror_damage = 1 :  $this->mirror_damage = 0;

        $val == 'yes' ? $this->step++ : $this->step += 2;


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
        if($this->step > 25){
            $this->saveUpdate();
        }else{
            $this->step++;
        }
    }

    public function saveUpdate(){
        if($this->carDamageReport){
            $this->carDamageReport->update([
                'any_damage' => $this->any_damage,
                'booking_id' => $this->booking_id,
                'return_id' => $this->return_id,
                'damaged_panel' => $this->damaged_panel,
                'damage_type' => $this->damage_type,
                'alloy_wheels_damage' => $this->alloy_wheels_damage,
                'alloy_damages' => $this->alloy_damages,
                'windscreen_damage' => $this->windscreen_damage,
                'windscreen_damages' => $this->windscreen_damages,
                'mirror_damages' => $this->mirror_damages,
                'warning_lights' => $this->warning_lights,
                'lights_on' => $this->lights_on,
                'seat_damage' => $this->seat_damage,
                'seat_damages' => $this->seat_damages,
                'fuel_cap' => $this->fuel_cap,
                'fuel_cap_images' => $this->fuel_cap_images,
                'fuel_cap_description' => $this->fuel_cap_description,

                'floor_mat' => $this->floor_mat,
                'floor_mat_images' => $this->floor_mat_images,
                'floor_mat_description' => $this->floor_mat_description,
                'aerial' => $this->aerial,
                'aerial_images' => $this->aerial_images,
                'aerial_description' => $this->aerial_description,
                'tools' => $this->tools,
                'tools_images' => $this->tools_images,
                'tools_description' => $this->tools_description,
                'clean_exterior' => $this->clean_exterior,
                'exterior_images' => $this->exterior_images,
                'exterior_description' => $this->exterior_description,
                'handbook' => $this->handbook,
                'handbook_images' => $this->handbook_images,
                'handbook_description' => $this->handbook_description,
                'spare_wheel' => $this->spare_wheel,
                'spare_wheel_images' => $this->spare_wheel_images,
                'spare_wheel_description' => $this->spare_wheel_description,
            ]);
        }else{
            $carDamageReport = CarDamageReport::create([
                'any_damage' => $this->any_damage,
                'booking_id' => $this->booking_id,
                'car_id' => $this->car_id,
                'return_id' => $this->return_id,
                'damaged_panel' => $this->damaged_panel,
                'damage_type' => $this->damage_type,
                'alloy_wheels_damage' => $this->alloy_wheels_damage,
                'alloy_damages' => $this->alloy_damages,
                'windscreen_damage' => $this->windscreen_damage,
                'windscreen_damages' => $this->windscreen_damages,
                'mirror_damages' => $this->mirror_damages,
                'warning_lights' => $this->warning_lights,
                'lights_on' => $this->lights_on,
                'seat_damage' => $this->seat_damage,
                'seat_damages' => $this->seat_damages,
                'fuel_cap' => $this->fuel_cap,
                'fuel_cap_images' => $this->fuel_cap_images,
                'fuel_cap_description' => $this->fuel_cap_description,

                'floor_mat' => $this->floor_mat,
                'floor_mat_images' => $this->floor_mat_images,
                'floor_mat_description' => $this->floor_mat_description,
                'aerial' => $this->aerial,
                'aerial_images' => $this->aerial_images,
                'aerial_description' => $this->aerial_description,
                'tools' => $this->tools,
                'tools_images' => $this->tools_images,
                'tools_description' => $this->tools_description,
                'clean_exterior' => $this->clean_exterior,
                'exterior_images' => $this->exterior_images,
                'exterior_description' => $this->exterior_description,
                'handbook' => $this->handbook,
                'handbook_images' => $this->handbook_images,
                'handbook_description' => $this->handbook_description,
                'spare_wheel' => $this->spare_wheel,
                'spare_wheel_images' => $this->spare_wheel_images,
                'spare_wheel_description' => $this->spare_wheel_description,
            ]);

            $this->carDamageReport = $carDamageReport;
        }

       return redirect()->route('vehicle_return.damage_report_images', $this->carDamageReport->id);
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
