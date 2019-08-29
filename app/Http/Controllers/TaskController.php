<?php

namespace App\Http\Controllers;

use App\Project;
use App\Sprint;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected function create(Project $project, Sprint $sprint = null)
    {
        return view("tasks.create", compact('project', 'sprint'));
    }

    protected function store(Request $request, Project $project, Sprint $sprint = null)
    {
        $task = Task::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'story_point' => $request->input('story_point'),
            'project_id' => $project->id,
            'sprint_id' => $sprint ? $sprint->id : null,
        ]);

        return redirect('/home')->with('status', 'Task created!');
    }


}
