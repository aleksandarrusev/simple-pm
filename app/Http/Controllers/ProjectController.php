<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected function create(array $data)
    {
        return Project::create([
            'name' => $data['name'],

        ]);
    }

}
