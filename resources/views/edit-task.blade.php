<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="{{ route('submitEditTask', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
                <input value='{{old('title', $task->title)}}'  name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{old('body', $task->body)}}</textarea>
                @error('body')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="image" class="text-muted mb-1"><small>Upload an image:</small></label>
                <input type="file" id="image" name="image" accept="image/*" class="text-muted mb-1">
                @error('image')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="task-priority" class="text-muted mb-1"><small>Priority</small></label>
                <select name="priority" id="task-priority">
                    <option value="">Select Priority</option>
                    <option value="High" {{ old('priority', $task->priority) === 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ old('priority', $task->priority) === 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ old('priority', $task->priority) === 'Low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priority')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror               
            </div>
            <div class="form-group">
                <label for="task-assign" class="text-muted mb-1"><small>Assign</small></label>
                <select name="assignedTo" id="task-assign">
                    <option value="">Assign</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{ old('assignedTo', $task->assignedTo) == $user->id ? 'selected' : '' }}> {{$user->id}}:{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('assign')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="task-status" class="text-muted mb-1"><small>Status</small></label>
                <select name="status" id="task-status">
                    <option value="">Select Status</option>
                    <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="None" {{ old('status', $task->status) === 'None' ? 'selected' : '' }}>None</option>
                    <option value="In Progress" {{ old('status', $task->status) === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                </select>
                @error('status')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>

            <button class="btn btn-primary">Update Task</button>

            
        </form>
    </div>
</x-layout>