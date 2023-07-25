<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class FrontPageController extends Controller
{
    public function home(){
        $page = Page::where('path','/')->firstOrFail();
//        $contents = $page->contents;
        $contents = Blade::compileString($page->content);
        return view('frontpage.page', compact('contents'));
    }

    public function builder(){
        return view('frontpage.home');
    }
    public function builder2(){
        return view('frontpage.builder');
    }
    public function list(){
        return view('frontpage.list_cars');
    }
    public function flight(){
        return view('frontpage.flight');
    }

    public function page($slug){
        $page = Page::where('path',$slug)->firstOrFail();
//        $contents = $page->contents;
        $contents = Blade::compileString($page->content);

        return view('frontpage.page', compact('contents'));
    }
}
