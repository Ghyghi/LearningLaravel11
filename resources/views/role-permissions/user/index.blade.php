<x-layout>
    {{-- @include('role-permissions.navbar') --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles
                            <a href="{{ url('users/create') }}" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if (count($item->getRoleNames()) > 0)
                                            @foreach ($item->getRoleNames() as $roleName)
                                                <span class="badge bg-primary mx-1">{{ $roleName }}</span>
                                            @endforeach
                                        @else
                                            <span class="badge bg-danger mx-1">No Role</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('users/'.$item->id.'/edit') }}" class="btn btn-success">Edit</a> 
                                        <a href="{{ url('users/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a>
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