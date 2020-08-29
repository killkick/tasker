<?php

namespace App\Http\Controllers;

use App\Mail\StatusChanged;
use App\Status;
use App\Task;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{

    public function store(Request $request)
    {
        $attributes = $this->validatedData();
        if ($request->has('image')) {
          $task =  Task::create([
                'name' => $attributes['name'],
                'status_id' => $attributes['status'],
                'project_id' => $request->input('project_id'),
                'image' => $attributes['image']->store('uploads', 'uploads')

            ]);
        } else {
          $task =   Task::create([
                'name' => $attributes['name'],
                'project_id' => $request->input('project_id'),
                'status_id' => $attributes['status'],
            ]);

        }
        return redirect('/tasks/'. $task->id);
    }

    public function show(Task $task )
    {
        return view('tasks.task-solo', ['task' => $task, 'statuses' => Status::all()]);
    }

    public function update(Request $request, Task $task , Status $status)
    {
        $attributes = $this->validatedData();
        if($task->status()->get()->first()->id != $request->input('status')) {
            Mail::to('test@test.com')->send(new StatusChanged($status));
        }
        if ($request->has('image')) {
          $newTask =  $task->update([
                'name' => $attributes['name'],
                'status_id' => $attributes['status'],
                'project_id' => $request->input('project_id'),
                'image' => $attributes['image']->store('uploads', 'uploads')
            ]);
        } else {
            $newTask =    $task->update([
                'name' => $attributes['name'],
                'project_id' => $request->input('project_id'),
                'status_id' => $attributes['status'],
            ]);

        }



        return back();
    }

    public function destroy(Task $task)
    {
            $task->delete();
            return redirect('/project/'. $task->project->id);
    }

    public function validatedData()
    {
        return $attributes = \request()->validate([
            'name' => 'required|max:255',
            'image' => 'file|nullable',
            'status' => 'required',
        ]);
    }


}
