<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsPublicController extends Controller
{
    public function index()
    {
        $news = News::where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        if (!$news->is_active) {
            abort(404);
        }

        return view('news.show', compact('news'));
    }
}
