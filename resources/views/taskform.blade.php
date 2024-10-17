<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="{{route('submitCreateTask')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="task-title" class="text-muted mb-1"><small>Title</small></label>
                <input value='{{old('title')}}' name="title" id="task-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="task-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea name="body" id="task-body" class="body-content tall-textarea form-control" type="text" placeholder="Enter task details...">{{old('body')}}</textarea>
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
                <select name="priority" id="task-priority" class="text-muted mb-1">
                    <option value="">Select Priority</option>
                    <option value="High" {{ old('priority') === 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ old('priority') === 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ old('priority') === 'Low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priority')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror               
            </div>
            <div class="form-group">
                <label for="task-assign" class="text-muted mb-1"><small>Assign</small></label>
                <select name="assignedTo" id="task-assign" class="text-muted mb-1">
                    <option value="">Assign</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{ old('assignedTo') == $user->id ? 'selected' : '' }}> {{$user->id}}:{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('assignedTo')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="task-status" class="text-muted mb-1"><small>Status</small></label>
                <select name="status" id="task-status" class="text-muted mb-1">
                    <option value="">Select Status</option>
                    <option value="Completed" {{ old('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Assigned" {{ old('status') === 'None' ? 'selected' : '' }}>Assigned</option>
                    <option value="In Progress" {{ old('status') === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                </select>
                @error('status')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Save New Task</button>
        </form>
    </div>
</x-layout>
