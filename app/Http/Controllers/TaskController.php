<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10); 
        return view('tasks.tasks-home', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|in:high,medium,low',
            'category' => 'nullable|max:100',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.tasks-home')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'due_date' => 'nullable|date',
            'completed' => 'boolean',
            'priority' => 'nullable|in:high,medium,low',
            'category' => 'nullable|max:100',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.tasks-home')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.tasks-home')->with('success', 'Task deleted successfully!');
    }
}