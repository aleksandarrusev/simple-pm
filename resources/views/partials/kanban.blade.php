<div class="col-md-8">
    <h3>Tasks:</h3>
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item">{{ $task->name  }}</li>
        @endforeach
    </ul>
</div>
<div class="col-md-4 text-right">
    @if($user->canEditProject($project))
        <a href="{{ route('tasks.create', array($project))  }}" class="btn btn-primary btn-sm">Create Task</a>
    @endif
</div>
