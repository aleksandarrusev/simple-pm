@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{ $task->name }}</div>

                    <div class="card-body">
                        <form class="form"
                              action="{{ route('tasks.update', array($project, $task, $sprint) ) }}"
                              method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Task name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="type">Task type</label>
                                <select class="custom-select" name="type" id="type" required>
                                    <option value="Story" {{ $task->type === 'story' ? 'selected' : null }}>Story
                                    </option>
                                    <option value="Bug" {{ $task->type === 'bug' ? 'selected' : null }}>Bug</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assignee">Assignee</label>
                                <select class="custom-select" name="assignee" id="assignee">
                                    <option value="" >Unassigned</option>
                                @foreach($users as $user)
                                        <option value="{{ $user->id }}"
                                                {{ $user->id === $task->assignee_id ? 'selected' : null }}
                                        >
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status" id="status">
                                    <option value="">No status</option>
                                    @if($columns)
                                        @foreach($columns as $column)
                                            <option value="{{  $column->id}}"
                                                    {{ $column->id === $task->column_id ? 'selected' : null }}
                                            >
                                                {{ $column->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="story-point">Story point</label>
                                <input type="text" class="form-control" id="story-point" name="story-point"
                                       value="{{ $task->getAttribute('story_point') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea rows="10" class="form-control" id="description"
                                          name="description">{{ $task->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Update Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection