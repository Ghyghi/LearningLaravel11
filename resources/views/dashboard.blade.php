<x-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center bg-secondary text-white">
                <h1>Welcome, {{ auth()->user()->name }}!</h1>
            </div>
            <p>A total of <strong>{{ $tasks }}</strong> tasks have been assigned to you</p>
            <div class='card-header'>
                <h3>Tasks Breakdown</h3>
            </div>
            <div class="card-body">
                <h4>By Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Completed</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ $completed }}</strong> of your tasks are completed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>In-Progress</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ $pending }}</strong> of your tasks are pending</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Assigned</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ $assigned }}</strong> of your tasks have not yet been started</p>
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
                                <p><strong>{{ $high }}</strong> of your tasks are high priority</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Medium</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ $medium }}</strong> of your tasks are medium priority</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-header bg-secondary text-white">
                                <h4>Low</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>{{ $low }}</strong> of your tasks are low priority</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>