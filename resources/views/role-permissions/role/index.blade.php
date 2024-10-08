<x-layout>
    @include('role-permissions.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles
                            <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a>
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
                                @foreach ($roles as $item)
                                    <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{ url('roles/'.$item->id.'/givePermission') }}" class="btn btn-success">Edit Permission</a> 
                                        <a href="{{ url('roles/'.$item->id.'/edit') }}" class="btn btn-success">Edit Role</a> 
                                        <a href="{{ url('roles/'.$item->id.'/delete') }}" class="btn btn-danger">Delete Role</a>
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