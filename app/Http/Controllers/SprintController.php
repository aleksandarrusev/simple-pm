<?php

namespace App\Http\Controllers;

use App\BoardColumn;
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
        $columns = json_decode($request->input('columns'), true);

        $sprint = Sprint::create([
            'name' => $request->input('name'),
            'begin' => $request->input('begin'),
            'end' => $request->input('end'),
            'project_id' => $project->id,
        ]);

        foreach($columns as $column) {
            $newColumn = BoardColumn::make($column);
            $newColumn->board_id = $sprint->board_id;
            $newColumn->save();
        };

        return redirect()->route('projects.show', $project)->with('status', 'Sprint created!');
    }

    protected function edit(Project $project, Sprint $sprint)
    {
        $boardColumns = $sprint->boardColumns()->get()->sortBy('order')->values()->all();

        return view("sprints.edit", compact('project', 'sprint', 'boardColumns'));
    }

    protected function update(Request $request, Project $project, Sprint $sprint)
    {
//        $updatedColumns = json_decode($request->input('columns'));
//
//        foreach ($sprint->boardColumns as $boardColumn) {
//            $found_key = array_search($boardColumn->id, array_column($updatedColumns, 'id'));
//            if ($found_key) {
//                $boardColumn->update([
//                    'order' => $updatedColumns[$found_key]->order,
//                ]);
//            }
//        };


        $sprint->update([
            'name' => $request->input('name'),
            'begin' => $request->input('begin'),
            'end' => $request->input('end'),
        ]);

        return redirect()->route('sprints.show', array($project, $sprint))->with('status', 'Sprint update!');
    }


    protected function show(Project $project, Sprint $sprint)
    {
        $name = $sprint->name;

        $columns = $sprint->boardColumns()->with(['tasks', 'tasks.assignee'])->get()->sortBy('order')->values()->all();

//        dd($columns);
        $tasks = Task::where([
            'project_id' => $project->id,
            'sprint_id' => $sprint->id,
            'column_id' => null,
        ])->get();

        return view("sprints.show", compact('name', 'project', 'columns', 'sprint', 'tasks'));
    }

}
