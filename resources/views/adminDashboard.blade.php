<x-layout>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center bg-secondary text-white">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="card-body">
                <p class="lead text-center">Welcome to the admin dashboard, {{ auth()->user()->name }}!</p>
            </div>
            
        </div>
    </div>
</x-layout>
