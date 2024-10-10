<x-layout>
    {{-- @include('role-permissions.navbar') --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h4>Permissions
                            <a href="{{ url('permissions/create') }}" class="btn btn-primary float-end">Add Permission</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $item)
                                    <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{ url('permissions/'.$item->id.'/edit') }}" class="btn btn-success">Edit</a> 
                                        <a href="{{ url('permissions/'.$item->id.'/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this permission?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>