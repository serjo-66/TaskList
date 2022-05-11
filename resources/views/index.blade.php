@extends('layout')

@section('title', 'Task')

@section('content')
    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">Create task</a>

    @foreach($tasks as $task)
    <div class="card text-center mt-3">
        <div class="card-header">
            <h5 class="card-title"><a href="{{ route('tasks.show', $task) }}" class="text-decoration-none text-reset">{{ $task->name }}</a></h5>
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
            {{ $task->updated_at->format('d/m/y H:i:s') }}
        </div>
    </div>
    @endforeach
@endsection
