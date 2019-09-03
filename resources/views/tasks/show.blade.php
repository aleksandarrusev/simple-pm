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
                        @if($sprint)
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ route('sprints.show', [$project, $sprint]) }}">
                                    {{ $sprint->name }}
                                </a>
                            </li>
                        @endif
                        <li class="breadcrumb-item active"> {{ $task->name }}</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ $task->name }}</span>
                        <span><a href="{{ route('tasks.edit', array($project, $task, $sprint)) }}">[Edit]</a></span>
                    </div>

                    <div class="card-body">
                        @include('partials.alert')
                        <div class="row">
                            <div class="col-md-8">
                                <p><strong>Description:</strong></p>
                                {{ $task->description }}
                            </div>
                            <div class="col-md-4">
                                <p>
                                    <strong>Type: </strong>
                                    <span class="{{ $task->type === 'bug' ? 'text-danger' : 'text-success'  }}">
                                        {{ $task->type }}
                                    </span>
                                </p>
                                @if($task->column)
                                    <p><strong>Column: </strong> {{ $task->column->name }}</p>
                                @endif
                                @if($assignee)
                                    <p><strong>Assignee: </strong> {{ $assignee }}</p>
                                @endif
                                @if($task->storyPoint)
                                    <p><strong>Story point: {{ $task->storyPoint }}</strong></p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection