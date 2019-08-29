<div class="col-md-8">
    <h3>Tasks:</h3>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name  }}</li>
        @endforeach
    </ul>
</div>
<div class="col-md-4 text-right">
    @if($user->canEditProject($project))
        <a href="{{ route('tasks.create', array($project))  }}" class="btn btn-primary btn-sm">Create Task</a>
        <a href="" class="btn btn-sm btn-default ml-3">Edit project</a>
    @endif
</div>
