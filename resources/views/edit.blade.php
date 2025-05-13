{{-- 
    Blade Template: Task Edit/Create View

    Description:
    This view extends the main application layout and includes a form partial, 
    passing a `$task` variable to it. It is typically used for creating or editing tasks 
    within a consistent layout structure.
--}}

{{-- Extends the base layout file located at resources/views/layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Starts the "content" section which will be injected into the @yield('content') section of the layout --}}
@section('content')

{{-- Includes the 'form' partial view and passes the 'task' variable to it.
         The form partial will use the $task variable to pre-fill fields when editing,
         or leave them empty when creating a new task. --}}
    @include('form', ['task' => $task])

{{-- Ends the "content" section --}}
@endsection
