@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row h-100">
                            <div class="col-md-4 h-100 d-flex justify-content-center align-items-center align-self-center">
                                <a href="{{ route('projects.create') }}" class="btn btn-primary">Create project</a>
                            </div>
                            <div class="col-md-8">
                                <h4>My projects</h4>
                                <ul>
                                @foreach($projects as $project)
                                    <li><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
