<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, {{ auth()->user()->name }}!</p>
    <p>A total of <strong>{{ $tasks }}</strong> tasks have been assigned to you</p>
    <div class='card-header'>
        <h3>Tasks Breakdown</h3>
    </div>
    <div class="card-body">
        <h4>By Status</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Completed</h4>
                    </div>
                    <div class="card-body">
                        <p>View all users</p>
                        <p>Create a new user</p>
                        <p>Update user details</p>
                        <p>Delete a user</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>In-Progress</h4>
                    </div>
                    <div class="card-body">
                        <p>View all roles</p>
                        <p>Create a new role</p>
                        <p>Update role details</p>
                        <p>Delete a role</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Assigned</h4>
                    </div>
                    <div class="card-body">
                        <p>View all permissions</p>
                        <p>Create a new permission</p>
                        <p>Update permission details</p>
                        <p>Delete a permission</p>
                    </div>
                </div>
            </div>
        </div>
        <h4>By Priority</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>High</h4>
                    </div>
                    <div class="card-body">
                        <p>View all users</p>
                        <p>Create a new user</p>
                        <p>Update user details</p>
                        <p>Delete a user</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Medium</h4>
                    </div>
                    <div class="card-body">
                        <p>View all roles</p>
                        <p>Create a new role</p>
                        <p>Update role details</p>
                        <p>Delete a role</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Low</h4>
                    </div>
                    <div class="card-body">
                        <p>View all permissions</p>
                        <p>Create a new permission</p>
                        <p>Update permission details</p>
                        <p>Delete a permission</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>