<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function create()
    {
        return view("projects.create");
    }

    protected function store(Request $request)
    {
        $user = $request->user();

        $project = Project::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'project_manager_id' => $request->input('project-manager-id'),
        ]);

        $project->users()->attach($user);

        return redirect('/home')->with('status', 'Project created!');
    }

    protected function show(Request $request, Project $project)
    {
        $user = $request->user();
        $kanban = $project->isKanban();
        $tasks = null;
        if ($kanban) {
            $tasks = Task::where([
                'project_id' => $project->id,
                'column_id' => null,
            ])->get();
        }
        return view("projects.show", compact('project', 'user', 'kanban', 'tasks'));
    }
}
