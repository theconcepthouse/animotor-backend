<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function home(){
        $page = Page::where('path','/')->firstOrFail();
        $contents = $page->contents;
        return view('frontpage.page', compact('contents'));
    }

    public function builder(){
        return view('frontpage.home');
    }
    public function flight(){
        return view('frontpage.flight');
    }

    public function page($slug){
        $page = Page::where('path',$slug)->firstOrFail();
        $contents = $page->contents;
        return view('frontpage.page', compact('contents'));
    }
}
