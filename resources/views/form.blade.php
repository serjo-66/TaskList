@extends('layout')

@section('title', 'Task')

@section('content')

<form method="post" action="{{ route('tasks.store') }}">////////Кнопка не работает 26:44
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Task name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Please enter task" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Please enter description" name="body"></textarea>
    </div>
    <a class="btn btn-success">Create</a>
</form>



@endsection
