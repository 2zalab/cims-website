<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'activities' => Activity::count(),
            'news' => News::count(),
            'galleries' => Gallery::count(),
            'contacts' => Contact::where('is_read', false)->count(),
            'projects' => Project::count(),
        ];

        $recentActivities = Activity::latest()->take(5)->get();
        $recentNews = News::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentActivities', 'recentNews', 'recentContacts', 'recentProjects'));
    }
}
