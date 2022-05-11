@extends('layout')

@section('title', 'Task')

@section('content')
    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">Create task</a>

    @foreach($tasks as $task)
    <div class="card text-center mt-3">
        <div class="card-header">
            <h5 class="card-title">{{ $task->name }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $task->body }}</p>
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
            <a class="btn btn-outline-danger btn-sm">Delete</a>
        </div>
        <div class="card-footer text-muted">
            {{ $task->updated_at }}
        </div>
    </div>
    @endforeach
@endsection
