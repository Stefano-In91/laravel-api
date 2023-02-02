<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() 
    {
        $projects = Project::with('type', 'technologies')->get();
        
        return $projects;
    }

    public function show($slug)
    {
        try {
            $post = Project::where('slug', $slug)->with('type', 'technologies')->firstOrFail();
            return $post;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 Post not found'
            ], 404);
        }

        return $post;
    }
}
