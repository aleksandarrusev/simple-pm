<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function create(Request $request)
    {
        $users = User::where('id', '!=', $request->user()->id)->get();
        return view("projects.create", compact('users'));
    }

    protected function store(Request $request)
    {
        $user = $request->user();
        $users = json_decode($request->input('users'));

        $project = Project::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'project_manager_id' => $user->id,
        ]);
        array_push($users, $user->id);
        $project->users()->attach($users);

        return redirect('/home')->with('status', 'Project created!');
    }

    protected function edit(Request $request, Project $project)
    {
        $users = User::where('id', '!=', $project->project_manager_id)->get();
        $projectUsers = $project->users()->where('id', '!=', $project->project_manager_id)->get();

        return view("projects.edit", compact('project', 'users', 'projectUsers'));
    }

    protected function update(Request $request, Project $project)
    {
        $users = json_decode($request->input('users'));

        $project->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);
        array_push($users, $project->project_manager_id);
        $project->users()->sync($users);

        return redirect()->route('projects.show', $project)->with('status', 'Project updated!');
    }


    protected function show(Request $request, Project $project)
    {
        $user = $request->user();
        $kanban = $project->isKanban();
        $tasks = Task::where([
            'project_id' => $project->id,
            'column_id' => null,
            'sprint_id' => null,
        ])->get();

        return view("projects.show", compact('project', 'user', 'kanban', 'tasks'));
    }
}
