<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Role: {{$role->name}}
                            <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url ('roles/'.$role->id.'/givePermission') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for=""><strong> Permissions </strong></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        @foreach ($permission as $item)
                                            <label>
                                                <input 
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ old('name', $item->name) }}"
                                                {{ in_array($item->id, $rolePermission) ? 'checked':''}}
                                                >
                                                {{$item->name}}
                                            </label>
                                        @endforeach 
                                    </div>                                                                       
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>