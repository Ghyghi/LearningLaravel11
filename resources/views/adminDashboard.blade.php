<x-layout>
    {{-- @include('role-permissions.navbar') --}}
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard, {{ auth()->user()->name }}!</p>
    <p>The system has {{ $countAdmin }} admin users;</p>
    <ul>
        @foreach ($recordAdmin as $records)
            <li>{{ $records->name }}</li>
        @endforeach
    </ul>
    <p>The system has {{ $countSuperAdmin }} super admin users;</p>
    <ul>
        @foreach ($recordSuperAdmin as $record)
            <li>{{ $record->name }}</li>
        @endforeach
    </ul>
    <p>The system has {{ $countUser }} staff(user) users;</p>
    <ul>
        @foreach ($recordUser as $recordu)
            <li>{{ $recordu->name }}</li>
        @endforeach
    </ul>
    
    <h3>View their tasks</h3>
    <a href="{{ route('viewTasks') }}">Click here to see all their tasks</a>
</x-layout>