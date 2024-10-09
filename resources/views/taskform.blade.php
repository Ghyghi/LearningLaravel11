<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="{{route('submitCreateTask')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="task-title" class="text-muted mb-1"><small>Title</small></label>
                <input value='{{old('title')}}'  name="title" id="task-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
                @error('title')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="task-body" class="text-muted mb-1"><small>Body Content</small></label>
                <textarea name="body" id="task-body" class="body-content tall-textarea form-control" type="text">{{old('body')}}</textarea>
                @error('body')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="task-priority" class="text-muted mb-1"><small>Priority</small></label>
                <select name="priority" id="task-priority">
                    <option value="">Select Priority</option>
                    <option value="High">High</option>
                    <option value="Meduim">Meduim</option>
                    <option value="Low">Low</option>
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
                        <option value="{{$user->id}}"> {{$user->id}}:{{ $user->name }}</option>
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
                    <option value="Completed">Completed</option>
                    <option value="None">None</option>
                    <option value="In Progress">In Progress</option>
                </select>
                @error('status')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Save New Task</button>
        </form>
    </div>
</x-layout>