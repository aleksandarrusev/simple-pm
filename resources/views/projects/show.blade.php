@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">
                            Project {{ $project->name }}
                        </li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>{{ $project->name }}</span>
                        <span><a href="{{ route('projects.edit', $project) }}">[Edit]</a></span>
                    </div>
                    <div class="card-body">
                        @include('partials.alert')

                        <div class="row">
                            @if($kanban)
                                @include('partials.kanban')
                            @else
                                @include('partials.scrum')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection