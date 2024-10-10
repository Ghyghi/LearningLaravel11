<x-layout>
    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          <h2>{{$task->title}}</h2>
          @can(['Edit Task', 'Delete Task'])
            <span class="pt-2">
                <a href="/edit-task/{{$task->id}}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="delete-post-form d-inline" action="{{ route('deleteTask', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="delete-post-button text-danger" aria-label="Delete Task" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </span>
          @endcan
        </div>
  
        <p class="text-muted small mb-4">
          Created by {{$task->user->name}} on {{$task->created_at->format('d M, Y')}}
        </p>
  
        <div class="body-content">
            <p>{{$task->body}}</p>
            <p>Priority: {{$task->priority}}</p>
            <p>Status: {{$task->status}}</p>
            <p>Assigned to: {{$task->assignedto->name}}</p>
            <p>Created by: {{$task->user->name}}</p>
        </div>
        @auth
            @if(auth()->user()->hasPermissionTo('View All'))
              <a href="{{route('viewTasks')}}">Back to tasks</a>
            @else
              <a href="{{route('viewAllTasks')}}">Back to tasks</a>
            @endif
        @endauth
        
      </div>
</x-layout>