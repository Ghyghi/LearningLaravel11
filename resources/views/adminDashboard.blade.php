<x-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center bg-secondary text-white">
                <h1 >Welcome, {{ auth()->user()->name }}!</h1>
            </div>
            <div class="card-body">
                
                <p>You are currently logged in as <strong>{{ auth()->user()->roles->first()->name }}</strong> </p>
                @if (auth()->user()->roles->first()->name == 'Super Admin')
                    <p>You have the complete permissions to make CRUD operations on the system. <strong>Exercise that privilege with caution.</strong></p>
                @else
                    <p>You have limited permissions to make CRUD operations on the system. <strong>Exercise that privilege with caution.</strong></p>
                @endif
            </div>
            <div class='card-header'>
                <h3>Tasks Breakdown</h3>
            </div>
            
            <div class="card-body">
                <div>
                    <p>There are {{ $allTasks}} in the system.</p>
                </div>
                <h4>By Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Completed</h4>
                            </div>
                            <div class="card-body">
                                <p>There are {{ $completedTasks}} completed tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>In-Progress</h4>
                            </div>
                            <div class="card-body">
                                <p>There are {{ $pendingTasks}} pending tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Assigned</h4>
                            </div>
                            <div class="card-body">
                                <p>There are {{ $assignedTasks}} assigned tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>By Priority</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>High</h4>
                            </div>
                            <div class="card-body">
                                <p>There are {{ $highTasks}} High priority tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Medium</h4>
                            </div>
                            <div class="card-body">
                                <p>There are {{ $mediumTasks}} Medium priority tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Low</h4>
                            </div>
                            <div class="card-body">
                                <p>There are {{ $lowTasks}} Low priority tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-layout>
