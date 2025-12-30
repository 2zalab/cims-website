<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityPublicController extends Controller
{
    public function index()
    {
        $activities = Activity::where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('activities.index', compact('activities'));
    }

    public function show(Activity $activity)
    {
        if (!$activity->is_active) {
            abort(404);
        }

        return view('activities.show', compact('activity'));
    }
}
