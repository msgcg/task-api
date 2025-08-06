<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        $request->validate([
             'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'string|in:pending,in-progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

     public function update(Request $request, Task $task)
     {
         $validatedData = $request->validate([
             'title' => 'sometimes|required|max:255',
             'description' => 'nullable',
             'status' => 'sometimes|in:pending,in-progress,completed',
             'due_date' => 'nullable|date',
         ]);

         $task->update($validatedData);

         return response()->json($task);
     }

     public function destroy(Task $task)
     {
         $task->delete();

         return response()->json(null, 204);
     }
}
