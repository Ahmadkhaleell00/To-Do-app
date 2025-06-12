@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Todo</h1>
    <form method="POST" action="{{ route('todos.store') }}">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection
