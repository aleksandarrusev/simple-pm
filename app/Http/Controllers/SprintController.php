<?php

namespace App\Http\Controllers;

use App\Board;
use App\Project;
use App\Sprint;
use App\Task;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    protected function create(Project $project)
    {
        return view("sprints.create", compact('project'));
    }

    protected function store(Request $request, Project $project)
    {
        $sprint = Sprint::create([
            'name' => $request->input('name'),
            'begin' => $request->input('begin'),
            'end' => $request->input('end'),
            'project_id' => $project->id,
        ]);

        return redirect('/home')->with('status', 'Sprint created!');
    }

    protected function show(Project $project, Sprint $sprint)
    {
        $name = $sprint->name;
        $columns = $sprint->board()->with('boardColumns')->get()->pluck('boardColumns')->flatten();
        $tasks = Task::where([
            'project_id' => $project->id,
            'sprint_id' => $sprint->id,
            'column_id' => null,
        ])->get();

        return view("sprints.show", compact('name', 'project', 'columns', 'sprint', 'tasks'));
    }

}
