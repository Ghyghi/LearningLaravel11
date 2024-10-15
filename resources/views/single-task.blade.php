<x-layout>
  <div class="container py-md-5 container--narrow">
      <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="text-primary">{{$task->title}}</h2>
          @can(['Edit Task'])
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
          Created by <strong>{{$task->user->name}}</strong> on {{$task->created_at->format('d M, Y')}}
      </p>

      <div class="body-content bg-light p-3 rounded border mb-4">
          <p class="mb-2">{{$task->body}}</p>
          <p class="mb-2"><strong>Priority:</strong> {{$task->priority}}</p>
          <p class="mb-2"><strong>Status:</strong> {{$task->status}}</p>
          <p class="mb-2"><strong>Assigned to:</strong> {{$task->assignedUser->name}}</p>
          <p class="mb-2"><strong>Created by:</strong> {{$task->user->name}}</p>
          <h4 class="mt-4"><strong>Images associated with the task</strong></h4>
          @if($images->isEmpty())
              <p>No images available for this task.</p>
          @else
              <div class="card mt-3">
                  <div class="card-body d-flex flex-wrap">
                      @foreach ($images as $media)
                          <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="img-fluid rounded m-1" style="max-width: 100px;">
                      @endforeach
                  </div>
              </div>
          @endif
      </div>
      
      @auth
          @if(auth()->user()->hasPermissionTo('View All'))
              <a href="{{route('viewTasks')}}" class="btn btn-outline-secondary">Back to tasks</a>
          @else
              <a href="{{route('viewAllTasks')}}" class="btn btn-outline-secondary">Back to tasks</a>
          @endif
      @endauth
  </div>
</x-layout>
