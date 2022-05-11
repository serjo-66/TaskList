@extends('layout')

@section('title', 'Task ' .$task->name)

@section('content')
    <a href="{{ route('tasks.index') }} " class="btn btn-secondary mt-1 mb-3 btn-sm">Back to home</a>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $task->name }}</h5>
    </div>
    <div class="card-body">
        <p class="card-text">{{ $task->body }}</p>

        <form method="post" action="{{ route('tasks.destroy', $task) }}">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
            @csrf
            @method('DELETE')
            <button value="submit" class="btn btn-outline-danger btn-sm">Delete</button>
        </form>

    </div>
    <div class="card-footer text-muted">
        <p class="mb-0">Create: {{ $task->created_at->format('d/m/y H:i:s') }} Update: {{ $task->updated_at->format('d/m/y H:i:s') }}</p>
    </div>
</div>
@endsection
