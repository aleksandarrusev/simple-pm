<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <h3>Sprints:</h3>
            <ul>
                @foreach($project->sprints as $sprint)
                    <li><a href="{{ route('sprints.show', array($project, $sprint)) }}">{{ $sprint->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            @if($user->canEditProject($project))
                <a href="{{ route('sprints.create', $project) }}" class="btn btn-sm btn-primary">Create
                    sprint</a>
                <a href="" class="btn btn-sm btn-default ml-3">Edit project</a>
            @endif
        </div>
    </div>
</div>

