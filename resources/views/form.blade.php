@extends('layouts.app')

@section('title',isset($task) ? 'Edit Task': 'Add Task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')

<form method="POST" action="{{isset($task) ? route('tasks.update', ['task' =>$task->id]) : route ('tasks.store')}}">
        @csrf  
        @isset ($task)
            @method('PUT')
        @endisset
    <div class="mb-4">
        <label class="block uppercase text-slate-700 mb-2" for="title">Title</label>
        <input class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none" text="text" name="title" id="title" value="{{$task->title ?? old('title')}}">
            @error ('title')
                <p class="text-red-500 text-sm error-message">{{$message}}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label class="block uppercase text-slate-700 mb-2" for="description">Description</label>
        <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none" name="description" id="description" rows=5>{{$task->description ?? old('description')}}</textarea>
            @error ('description')
                <p class="text-red-500 text-sm error-message">{{$message}}</p>
            @enderror
    </div>

    <div class="mb-4">
        <label class="block uppercase text-slate-700 mb-2" for="long_description">Long Description</label>
        <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"name="long_description" id="long_description" rows=10>{{$task->long_description ?? old('long_description')}}</textarea>
            @error ('long_description')
                <p class="text-red-500 text-sm error-message">{{$message}}</p>
            @enderror
    </div>

    <div class="mb-4 flex items-center gap-2 ">
        <button type="submit" class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slade-700/10 hover:bg-slate-50">
            @isset($task) 
                Update
            @else 
                Add 
            @endisset
        </button>
        <a href="{{route('tasks.index')}}" class="font-medium text-gray-700 underline decoration-pink-500">Cancel</a>
    </div>
</form>
@endsection