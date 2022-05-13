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
        $query = Task::query();
        $user = auth()->user();

        if ($user) {
            $query->where('user_id', $user->id);
        }
        $tasks = $query->get()->reverse();

        return view('index', compact('tasks'));
    }

    public function create()
    {
        $user = auth()->user();

        return view('form', compact('user'));
    }

    public function store(TaskRequest $request)
    {

        Task::create($request->only(['name', 'body', 'user_id']));
        return redirect()->route('tasks.index')->withSuccess('Created task ' .$request->name);
    }

    public function show(Task $task)
    {
        return view('show', compact('task'));
    }

    public function edit(Task $task)
    {
        $user = auth()->user();
        return view('form', compact('task', 'user'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->only(['name', 'body', 'user_id']));
        return redirect()->route('tasks.index')->withSuccess('Updated task ' .$task->name);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->withDanger('Delete task ' .$task->name);
    }

}
