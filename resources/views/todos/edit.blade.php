@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Todo</h1>
    <form method="POST" action="{{ route('todos.update', $todo->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $todo->title }}" required>
        </div>
        <div class="form-group mt-2">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $todo->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
