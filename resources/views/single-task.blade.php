<x-layout>
    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          <h2>{{$task->title}}</h2>
          @can('update', $task)
            <span class="pt-2">
              <a href="/edit-task/{{$task->id}}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
              <form class="delete-post-form d-inline" action="{{route('deleteTask', $task->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
              </form>
            </span>
          @endcan
        </div>
  
        <p class="text-muted small mb-4">
          Posted by <a href="#">{{$task->user->name}}</a> on {{$task->created_at->format('d M, Y')}}
        </p>
  
        <div class="body-content">
            <p>{{$task->body}}</p>
        </div>
        @auth
            @if(auth()->user()->isAdmin===1)
            <a href="{{route('viewTasks')}}">Back to tasks</a>
            @else
            <a href="{{route('viewAllTasks')}}">Back to tasks</a>
            @endif
        @endauth
        
      </div>
</x-layout>