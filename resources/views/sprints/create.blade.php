@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">

                        <form class="form" action="{{ route("sprints.store", $project) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Sprint name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="project-name">Date start</label>
                                <input type="date" class="form-control" id="project-name" name="begin" required>
                            </div>
                            <div class="form-group">
                                <label for="project-name">Date end</label>
                                <input type="date" class="form-control" id="project-name" name="end" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Create sprint</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection