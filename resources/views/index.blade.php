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
            <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
            <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
        </div>
        <div class="card-footer text-muted">
            2 дня спустя
        </div>
    </div>
    @endforeach
@endsection
