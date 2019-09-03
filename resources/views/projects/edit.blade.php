@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{ $project->name }}</div>

                    <div class="card-body">

                        <form class="form" action="{{ route("projects.update", $project) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Project name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Project type</label>
                                <select class="custom-select" name="type" id="type">
                                    <option value="Scrum" {{ $project->type === 'Scrum' ? 'selected' : null }}>Scrum</option>
                                    <option value="Kanban" {{ $project->type === 'Kanban' ? 'selected' : null }}>Kanban</option>
                                </select>
                            </div>
                            <manage-users users="{{ $users }}" existing-users="{{ $projectUsers }}"></manage-users>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Update project</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection