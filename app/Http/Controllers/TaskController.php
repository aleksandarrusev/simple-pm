<?php

namespace App\Http\Controllers;

use App\Project;
use App\Sprint;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected function create(Project $project, Sprint $sprint = null)
    {
        $users = $project->users()->get();
        $columns = $sprint ? $sprint->boardColumns()->get() : null;

        return view("tasks.create", compact('project', 'sprint', 'users', 'columns'));
    }

    protected function store(Request $request, Project $project, Sprint $sprint = null)
    {

        $task = Task::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'story_point' => $request->input('story-point'),
            'column_id' => $request->input('status'),
            'assignee_id' => $request->input('assignee'),
            'project_id' => $project->id,
            'sprint_id' => $sprint ? $sprint->id : $request->input('sprint'),
        ]);
        return redirect()->route('tasks.show', array($project, $task, $sprint))->with('status', 'Task created!');
    }

    protected function edit(Project $project, Task $task, Sprint $sprint = null)
    {
        $users = $project->users()->get();
        $updateLink = route("tasks.update", array($project, $task, $sprint));

        $columns = $sprint ? $sprint->boardColumns()->get() : null;

        return view("tasks.edit", compact('project', 'sprint', 'users', 'task', 'columns'));
    }

    protected function update(Request $request, Project $project, Task $task, Sprint $sprint = null)
    {
        $task->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'story_point' => $request->input('story-point'),
            'column_id' => $request->input('status'),
            'assignee_id' => $request->input('assignee'),
        ]);
        return redirect()->route('tasks.show', array($project, $task, $sprint))->with('status', 'Task updated!');
    }

    protected function show(Project $project, Task $task, Sprint $sprint = null)
    {
        $assignee = null;

        if ($task->assignee()->first()) {
            $assignee = $task->assignee()->first()->name;
        }

        return view("tasks.show", compact('task', 'project', 'sprint', 'assignee'));
    }

    protected function assign(Task $task, User $user)
    {
        $task->update([
            'assignee_id' => $user->id,
        ]);
        return view("tasks.show", compact('task', 'sprint'));
    }

    protected function changeColumn(Request $request)
    {
         $taskId = $request->taskId;
         Task::find($taskId)->update([
            'column_id' => $request->columnId,
         ]);

         return response()->json(['data' => 'Column changed successfully.'], 200);

    }


}
