<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Project;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function index() {
        return view('projects.home', [

            'projects' => auth()->user()->project,
            'tasks'
        ]);

    }
    public function store(Request $request) {
        $attributes =  ['name' => $request->name];
        $project = Project::create([
            'name' => $attributes['name'],
            'user_id' => auth()->id()
        ]);
        return redirect('/project/' . $project->id)->with('success', 'Your Project was created succesfully');
    }
    public function show(Project $project) {


        return view('projects.solo' , [ 'project' => $project , 'tasks' => $project->task , 'statuses' => Status::all()]);
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect('/');
    }

}
