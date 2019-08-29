@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">

                        <form class="form"
                              action="{{  $project->isKanban() ? route("tasks.store", array($project)) : route("sprints.tasks.store", array($project,$sprint)) }}"
                              method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Task name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Task type</label>
                                <select class="custom-select" name="type" id="type" required>
                                    <option value="Story">Story</option>
                                    <option value="Bug" selected>Bug</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="story-point">Story point</label>
                                <input type="text" class="form-control" id="story-point" name="story-point">
                            </div>
                            <div class="form-group">
                                <label for="description">Story point</label>
                                <textarea type="text" class="form-control" id="description" name="description">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Create Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection