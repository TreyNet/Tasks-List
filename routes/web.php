<?php

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return redirect()->route('tasks.index');
});
   
Route::get('/tasks', function () {
    return view('index',[
    'tasks' => Task::latest()->paginate(10)]);
})->name('tasks.index');

Route::view('/tasks/create','create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view ('edit',['task' => $task]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view ('show',['task' => $task]);
})->name('task.show');

Route::post('/tasks', function (TaskRequest $request){
    $task = Task::create($request->validated());
    return redirect()->route('task.show', ['task'=>$task->id])
    ->with('success', 'Task successfully created!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){
    $task->update($request->validated());
    return redirect()->route('task.show', ['task'=>$task->id])
    ->with('success', 'Task successfully updated!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task){
    $task->delete();
    return redirect()->route('tasks.index')
    ->with('success', 'Task successfully deleted!');
    })->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task successfully updated');
})->name('tasks.toggle-complete');
