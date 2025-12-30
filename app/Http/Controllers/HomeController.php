<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $news = News::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $galleries = Gallery::where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        $partners = Partner::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('home', compact('activities', 'news', 'galleries', 'partners'));
    }
}
