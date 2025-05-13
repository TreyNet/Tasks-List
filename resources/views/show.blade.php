{{-- 
    Blade Template: Task Detail View

    Description:
    This view shows the full details of a single task, including its title, description,
    long description (if available), timestamps, and completion status.
    It also provides options to edit, toggle completion status, and delete the task.
--}}

{{-- Extends the main application layout --}}
@extends('layouts.app')

{{-- Sets the page title dynamically to the task's title --}}
@section('title', $task->title)

{{-- Content section begins --}}
@section('content')

    {{-- Navigation link to go back to the task list --}}
    <div class="mb-4">
        <a href={{ route('tasks.index') }} class="font-medium text-gray-700 underline decoration-pink-500">
            < Go back</a>
    </div>

    {{-- Short description of the task --}}
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    {{-- Long description is only shown if it exists --}}
    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    {{-- Display creation and update timestamps using readable format --}}            
    <p class="mb-4 text-sm text-slate-500">Created: {{ $task->created_at->diffForHumans() }} | Updated:
        {{ $task->updated_at->diffForHumans() }}</p>

    {{-- Show completion status with appropriate color and label --}}         
    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    {{-- Action buttons: Edit, Toggle Completion, and Delete --}}
    <div class="flex gap-2">

        {{-- Edit task link --}}
        <a href="{{ route('task.edit', ['task' => $task]) }}"
            class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slade-700/10 hover:bg-slate-50">Edit</a>

        {{-- Toggle completion status form --}}
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit"
                class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slade-700/10 hover:bg-slate-50">
                Mark as {{ $task->completed ? 'Not completed' : 'Completed' }}
            </button>
        </form>

        {{-- Delete task form --}}
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slade-700/10 hover:bg-slate-50">Delete</button>
        </form>
    </div>

{{-- Content section ends --}}
@endsection
