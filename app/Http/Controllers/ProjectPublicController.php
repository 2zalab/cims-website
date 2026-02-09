<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectPublicController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        if (!$project->is_active) {
            abort(404);
        }

        return view('projects.show', compact('project'));
    }
}
