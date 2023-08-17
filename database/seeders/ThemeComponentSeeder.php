<?php

namespace Database\Seeders;

use App\Models\ThemeComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    protected array $data = [
//        [
//            'title' => 'Banner slider',
//            'content' =>  'banner_slider.html'
//        ],
//        ['title' => 'Popular services section', 'content' =>  'popular_services_section.html'],
//        ['title' => 'Popular services', 'content' =>  'popular_services.html'],
//        ['title' => 'Popular car type', 'content' =>  'popular_car_type.html'],
//        ['title' => 'Pricing section', 'content' =>  'pricing_section.html'],
//        ['title' => 'Search section', 'content' =>  'search_section.html'],
//        ['title' => 'Services section', 'content' =>  'services_section.html'],
//        ['title' => 'Testimonial section', 'content' =>  'testimonial_section.html'],
//        ['title' => 'Faqs section', 'content' =>  'faqs.html'],
//        ['title' => 'Facts number count section', 'content' =>  'facts_number_count.html'],
//        ['title' => 'Popular explore section', 'content' =>  'popular_explore.html'],
//        ['title' => 'Breadcrumb', 'content' =>  'breadcrumb.html'],
        ['title' => 'Content', 'content' =>  'content.html'],
        ['title' => 'Blank', 'code' =>  ''],
        ['title' => 'Shortcode', 'code' =>  'is_shortcode'],

    ];


    public function run(): void
    {
        $data = $this->data;
        $shortcode = ThemeComponent::where('title','Shortcode')->first();
        if(!$shortcode){
            ThemeComponent::truncate();
            foreach ($data as $item) {
                $content = $item['code'] ?? file_get_contents(public_path('vendor/pages/' . $item['content']));
//                $item['content'] = $content;
                ThemeComponent::create(['title' => $item['title'], 'content' => $content]);
            }
        }
    }
}
