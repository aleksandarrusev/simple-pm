@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">

                        <form class="form"
                              action="{{ route("tasks.store", array($project,$sprint)) }}"
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
                                <label for="assignee">Assignee</label>
                                <select class="custom-select" name="assignee" id="assignee">
                                    <option selected value="">Select assignee</option>
                                    @foreach($users as $user)
                                        <option value="{{  $user->id}}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(!$project->isKanban())
                                @if($columns)
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="custom-select" name="status" id="status">
                                            <option selected value="">Select column</option>
                                            @foreach($columns as $column)
                                                <option value="{{  $column->id}}">{{ $column->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="sprint">Sprint</label>
                                    <select class="custom-select" name="sprint" id="sprint">
                                        <option selected value="">Select sprint</option>
                                        @foreach($project->sprints as $projectSprint)
                                            <option value="{{ $projectSprint->id}}"
                                                @if($sprint)
                                                    {{ $projectSprint->id === $sprint->id ? 'selected' : null }}
                                                @endif
                                            >
                                                {{ $projectSprint->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="story-point">Story point</label>
                                <input type="text" class="form-control" id="story-point" name="story-point">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="10" type="text" class="form-control" id="description"
                                          name="description">
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