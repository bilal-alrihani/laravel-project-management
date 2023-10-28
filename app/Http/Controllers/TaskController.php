<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $books = Task::all();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Task::findOrFail($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $book = Task::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Task::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Task::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
