<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with("type","technologies")->paginate(12);
        return response()->json([
            'success'=> true,
            'results'=> $projects
        ]);
    }
    public function show(Project $project){
        $project = Project::with("type","technologies")->findOrFail($project->id);
        return response()->json([
            'success'=> true,
            'results'=> $project
        ]);
    }
}