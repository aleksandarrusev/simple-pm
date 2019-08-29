@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $name }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <ul>
                                    @foreach($columns as $column)
                                        <li>{{ $column->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('sprints.tasks.create', array($project, $sprint))  }}" class="btn btn-primary btn-sm">Create
                                    Task</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Backlog</h3>
                                <ul>
                                    @foreach($tasks as $task)
                                        <li>{{ $task->name  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection