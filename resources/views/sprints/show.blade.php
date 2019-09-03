@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('projects.show', $project) }}">Project {{ $project->name }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $sprint->name }}</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ $sprint->name }}</span>
                        <span><a href="{{ route('sprints.edit', array($project, $sprint)) }}">[Edit]</a></span>
                    </div>

                    <div class="card-body">
                        @include('partials.alert')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between mb-2">
                                    <h3>Board</h3>
                                    <div>
                                        <a href="{{ route('tasks.create', array($project, $sprint))  }}"
                                           class="btn btn-primary btn-sm">
                                            Create Task
                                        </a>
                                    </div>

                                </div>
                                <Board columns="{{ json_encode($columns) }}" change-column-url="{{ route('tasks.change-column') }}"></Board>
                            </div>
                        </div>
                        <div class="row mt-4 mt-2">
                            <div class="col-md-12">
                                <h3>Sprint Backlog</h3>
                                <ul class="list-group">
                                    @foreach($tasks as $task)
                                        <li class="list-group-item">
                                            <a href="{{ route('tasks.show', array($project,$task, $sprint)) }}">{{ $task->name  }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection