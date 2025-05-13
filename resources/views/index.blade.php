{{-- 
    Blade Template: Tasks List View

    Description:
    This view displays a list of tasks. It provides a link to create a new task, 
    loops through the tasks to display each one, and shows pagination links if there are any tasks.
    Tasks marked as "completed" are displayed with a strikethrough style.
--}}

{{-- Extends the base layout from resources/views/layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Sets the page title to "Tasks List" --}}
@section('title', 'Tasks List')

{{-- Starts the "content" section to be injected into the layout --}}
@section('content')
    {{-- Link to the task creation page --}}
    <nav class="mb-4">
        <a href={{ route('tasks.create') }} class="font-medium text-gray-700 underline decoration-pink-500">Add Task</a>
    </nav>
    {{-- Loop through each task --}}
    @forelse($tasks as $task)
        <div>
            {{-- 
                Link to view a single task's details.
                The 'line-through' class is conditionally applied if the task is completed.
            --}}
            <a href="{{ route('task.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>

        </div>
    @empty
        {{-- Message shown if no tasks are found --}}
        <div>There are no tasks.</div>
    @endforelse

    @if ($tasks->count())
        {{-- Pagination navigation, shown only if there are tasks --}}
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif

{{-- Ends the "content" section --}}
@endsection
