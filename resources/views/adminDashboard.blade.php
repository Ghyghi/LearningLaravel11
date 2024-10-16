<x-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center bg-secondary text-white">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="card-body">
                <p class="lead text-center">Welcome, {{ auth()->user()->name }}!</p>
                <p>You are currently logged in as <strong>{{ auth()->user()->roles->first()->name }}</strong> </p>
                @if (auth()->user()->roles->first()->name == 'Super Admin')
                    <p>You have the complete permissions to make CRUD operations on the system. <strong>Exercise that privilege with caution.</strong></p>
                @else
                    <p>You have limited permissions to make CRUD operations on the system. <strong>Exercise that privilege with caution.</strong></p>
                @endif
            </div>
            <div>
                
            </div>
            
        </div>
    </div>
</x-layout>
