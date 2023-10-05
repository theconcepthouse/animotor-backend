<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Menu::count() < 1){
            $menu = Menu::create([
                'name' => 'Frontpage Top Menu',
                'slug' => 'frontpage-top-menu',
            ]);

            if ($menu){
                $pages = Page::all();
                foreach ($pages as $item){
                    MenuItem::create([
                        'label' => $item->title,
                        'url' => $item->path,
                        'menu_id' => $menu->id,
                    ]);
                }
            }
        }
    }
}
