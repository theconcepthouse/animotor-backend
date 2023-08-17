<?php

namespace App\Services;

class DataService
{
    public function timeZones()
    {
        return [
            [
                "value" => "America/Puerto_Rico",
                "name" => "Puerto Rico (Atlantic)"
            ],
            // ... rest of the time zones ...
            [
                "value" => "UTC",
                "name" => "UTC"
            ]
        ];
    }
}
