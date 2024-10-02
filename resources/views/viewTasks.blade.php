<x-layout>
    <h1>All user tasks</h1>
    <div class="container py-md-5 container--narrow">
        <div class="row">
            @foreach ($Tasks as $task)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">                            
                            <h3 class="card-title">{{ $task->title }}</h3>
                            <p>By {{ $task->user->name }}</p>
                            <a href="{{ route('viewSingleTask', $task->id) }}" class="card-text">See whole task</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>