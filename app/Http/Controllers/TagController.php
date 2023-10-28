<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $books = Tag::all();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = Tag::findOrFail($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $book = Tag::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Tag::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Tag::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
