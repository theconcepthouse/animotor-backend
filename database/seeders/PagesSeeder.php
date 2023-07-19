<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    protected array $data = [
        [
            'title' => 'Home',
            'path' => '/',
        ],
        [
            'title' => 'Privacy policy',
            'path' => 'privacy',
        ],
        [
            'title' => 'Privacy policy',
            'path' => 'privacy',
        ],
        [
            'title' => 'About us',
            'path' => 'about',
        ],
        [
            'title' => 'Contact us',
            'path' => 'contact_us',
        ],

    ];


    public function run(): void
    {
        $data = $this->data;
        if(Page::count() < 1){
            foreach ($data as $item){
                Page::create($item);
            }

        }
    }

}
