<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, {{ auth()->user()->name }}!</p>
    <a href="{{route('viewAllTasks')}}">See your tasks</a>
</x-layout>