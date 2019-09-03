<div class="col-md-12">
    <div class="row">
        <div class="col-md-8">
            <div>
                <h3>Sprints:</h3>
                <ul class="list-group">
                    @foreach($project->sprints as $sprint)
                        <li class="list-group-item">
                            <a href="{{ route('sprints.show', array($project, $sprint)) }}">
                                {{ $sprint->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4">
                <h3>Project backlog:</h3>
                <ul class="list-group">
                    @foreach($tasks as $task)
                        <li class="list-group-item"><a
                                    href="{{ route('tasks.show', array($project, $task)) }}">{{ $task->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4 text-right">
            @if($user->canEditProject($project))
                <a href="{{ route('sprints.create', $project) }}" class="btn btn-sm btn-primary">Create
                    sprint</a>
                <a href="{{ route('tasks.create', $project) }}" class="btn btn-sm btn-primary">Create task</a>
            @endif
        </div>
    </div>
</div>

