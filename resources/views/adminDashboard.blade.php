<x-layout>
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard, {{ auth()->user()->name }}!</p>
    <p>The system has {{ $count }} non-admin users;</p>
    <ul>
        @foreach ($records as $record)
            <li>{{ $record->name }}</li>
        @endforeach
    </ul>
    <p>The system has {{ $admin_count }} admin user(s);</p>
    <ul>
        @foreach ($admin_records as $records)
            <li>{{ $records->name }}</li>
        @endforeach
    </ul>
</x-layout>