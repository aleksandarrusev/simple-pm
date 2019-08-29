@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Project: {{ $project->name }}</div>
                    <div class="card-body">
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