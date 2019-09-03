@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit {{ $project->name }}</div>

                    <div class="card-body">

                        <form class="form" action="{{ route("sprints.update", array($project, $sprint)) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Sprint name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $sprint->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="project-name">Date start</label>
                                <input type="date" class="form-control" id="project-name" name="begin" value="{{ $sprint->begin }}" required>
                            </div>
                            <div class="form-group">
                                <label for="project-name">Date end</label>
                                <input type="date" class="form-control" id="project-name" name="end" value="{{ $sprint->end }}" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Update sprint</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
        <script>
            import ManageColumns from "../../js/components/ManageColumns";
            export default {
                components: {ManageColumns}
            }
        </script>