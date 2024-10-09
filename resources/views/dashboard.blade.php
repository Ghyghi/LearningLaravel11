<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, {{ auth()->user()->name }}!</p>
    <p>A total of <strong>{{ $tasks }}</strong> tasks have been assigned to you</p>
</x-layout>