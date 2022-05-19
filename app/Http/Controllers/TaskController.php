<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::ByUser()->get()->reverse();
        return view('index', compact('tasks'));

    }

    public function create()
    {
        $user = auth()->user();

        return view('form', compact('user'));
    }

    public function store(TaskRequest $request)
    {
        Task::create([
            'name' => $request->get('name'),
            'body' => $request->get('body'),
            'user_id' => $request->user() ? $request->user()->id : null,
        ]);
        return redirect()->route('tasks.index')->withSuccess('Created task ' . $request->name);

        /*Task::create($request->only(['name', 'body', 'user_id']));
        return redirect()->route('tasks.index')->withSuccess('Created task ' .$request->name);*/
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
        $task->update($request->only(['name', 'body', 'user_id']));
        return redirect()->route('tasks.index')->withSuccess('Updated task ' . $task->name);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->withDanger('Delete task ' . $task->name);
    }

}
