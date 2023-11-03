<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->get();
        return response()->json($projects);
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function store(Request $request)
    {
        $book = Project::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Project::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Project::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
