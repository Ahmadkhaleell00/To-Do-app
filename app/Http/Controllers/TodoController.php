<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 


class TodoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos;
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Auth::user()->todos()->create($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo Created!');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $todo->update($request->all());

        return redirect()->route('todos.index')->with('success', 'Todo Updated!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo Deleted!');
    }
}

