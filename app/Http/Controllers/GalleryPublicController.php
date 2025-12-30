<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryPublicController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('is_active', true)
            ->with('activity')
            ->latest()
            ->paginate(12);

        return view('gallery.index', compact('galleries'));
    }
}
