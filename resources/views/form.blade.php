{{-- 
    Blade Template: Task Form View

    Description:
    This view renders a form used for creating or editing tasks.
    It extends the base layout, sets a dynamic page title, includes custom styles,
    and displays a form that adapts based on whether a task is being created or updated.
--}}

{{-- Extends the base layout located at resources/views/layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Sets the page title dynamically based on whether the $task variable is set --}}
@section('title', isset($task) ? 'Edit Task' : 'Add Task')

{{-- Defines custom inline styles for the page --}}
@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

{{-- Content section starts here --}}
@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        {{-- 
            Form submission URL:
            - If editing: sends a PUT request to tasks.update with the task ID
            - If creating: sends a POST request to tasks.store
        --}}
        {{-- Laravel CSRF protection token --}}
        @csrf
        @isset($task)
            {{-- Spoofs the HTTP method as PUT for updating tasks --}}
            @method('PUT')
        @endisset
        {{-- Title Input --}}
        <div class="mb-4">
            <label class="block uppercase text-slate-700 mb-2" for="title">Title</label>
            <input class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                text="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            {{-- Displays old input or the task's existing title --}}
            @error('title')
                {{-- Validation error for title --}}
                <p class="text-red-500 text-sm error-message">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description Input --}}
        <div class="mb-4">
            {{-- Displays old input or the task's existing description --}}
            <label class="block uppercase text-slate-700 mb-2" for="description">Description</label>
            <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                name="description" id="description" rows=5>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                {{-- Validation error for description --}}
                <p class="text-red-500 text-sm error-message">{{ $message }}</p>
            @enderror
        </div>

        {{-- Long Description Input --}}
        <div class="mb-4">
            {{-- Displays old input or the task's existing long description --}}
            <label class="block uppercase text-slate-700 mb-2" for="long_description">Long Description</label>
            <textarea
                class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"name="long_description"
                id="long_description" rows=10>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                {{-- Validation error for long description --}}
                <p class="text-red-500 text-sm error-message">{{ $message }}</p>
            @enderror
        </div>

        {{-- Form Buttons: Submit and Cancel --}}
        <div class="mb-4 flex items-center gap-2 ">
            {{-- Button label changes based on whether editing or creating --}}
            <button type="submit"
                class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slade-700/10 hover:bg-slate-50">
                @isset($task)
                    Update
                @else
                    Add
                @endisset
            </button>
            {{-- Cancel link redirects back to the task list --}}
            <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">Cancel</a>
        </div>
    </form>
{{-- End of content section --}}
@endsection
