@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">

                        <form class="form" action="{{ route("projects.store") }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Project name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="type">Project type</label>
                                <select class="custom-select" name="type" id="type">
                                    <option value="Scrum" selected>Scrum</option>
                                    <option value="Kanban">Kanban</option>
                                </select>
                            </div>
                            <manage-users users="{{ $users }}"></manage-users>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Create project</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
        <script>
            import ManageUsers from "../../js/components/ManageUsers";
            export default {
                components: {ManageUsers}
            }
        </script>