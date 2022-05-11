<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->only(['name', 'body']));
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('form', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->only(['name', 'body']));
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

}
