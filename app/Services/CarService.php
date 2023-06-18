<?php

namespace App\Services;

use App\Models\Car;


class CarService
{
    public function createOrUpdate(?Car $car, $data): Car
    {
        if(!$car){
            return Car::create($data);
        }
        $car->title = $data['title'] ?? $car->title;
        $car->make = $data['make'] ?? $car->make;
        $car->model = $data['model'] ?? $car->model;
        $car->type = $data['type'] ?? $car->type;
        $car->year = $data['year'] ?? $car->year;
        $car->color = $data['color'] ?? $car->color;
        $car->gear = $data['gear'] ?? $car->gear;
        $car->door = $data['door'] ?? $car->door;
        $car->vehicle_no = $data['vehicle_no'] ?? $car->vehicle_no;
        $car->image = $data['image'] ?? $car->image;

        $car->save();

        return $car;
    }

}
