@extends('layout')

@section('title', isset($task) ? 'Update ' .$task->name : 'Create task')

@section('content')
    <a href="{{ route('tasks.index') }} " class="btn btn-secondary mt-1 mb-3 btn-sm">Back to home</a>
<form method="post"
      @if(isset($task))
      action="{{ route('tasks.update', $task) }}"
      @else
      action="{{ route('tasks.store') }}"
      @endif
        >
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="mb-3">

        <input hidden value="{{ $user->id }}" name="user_id">
        <label for="exampleFormControlInput1" class="form-label">Task name</label>
        <input type="text" class="form-control"
               value="{{ old('name', isset($task) ? $task->name : null) }}"
               id="exampleFormControlInput1" placeholder="Please enter task" name="name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Please enter description" name="body">{{ old('body', isset($task) ? $task->body : null) }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">{{ isset($task) ? 'Update' : 'Create' }}</button>
</form>


@endsection
