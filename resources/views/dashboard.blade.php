<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, {{ auth()->user()->name }}!</p>
    <a href="/all-tasks">See your tasks</a>
</x-layout>