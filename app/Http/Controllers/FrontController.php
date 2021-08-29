<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\News;
use App\Models\Photoalbum;
use App\Models\Videoalbum;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();

        $news = News::orderBy('created_at', 'desc')->take(2)->get();
        $pages = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->get();
        $photoalbums = Photoalbum::orderBy('created_at', 'desc')->first();
        $videoalbums = Videoalbum::orderBy('created_at', 'desc')->first();

        $page1 = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->first();
        $page2 = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->skip(1)->first();
        $page3 = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->skip(2)->first();
        $page4 = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->skip(3)->first();
        $page5 = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->skip(4)->first();
        $page6 = Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->skip(5)->first();

        return view('welcome', compact('settings', 'news', 'pages', 'photoalbums', 'videoalbums', 'page1', 'page2', 'page3', 'page4', 'page5', 'page6'));
    }
}
