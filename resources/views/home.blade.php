@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @include('partials.alert')
                        <div class="row h-100">
                            <div class="col-md-8">
                                <h3 class="mb-3">My projects</h3>
                                <ul class="list-group">
                                    @foreach($projects as $project)
                                        <li class="list-group-item">
                                            <a href="{{ route('projects.show', $project) }}">
                                                {{ $project->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="{{ route('projects.create') }}" class="btn btn-primary">Create project</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
