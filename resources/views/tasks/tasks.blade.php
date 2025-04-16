<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        .task-list { list-style: none; padding: 0; }
        .task-item { display: flex; align-items: center; border-bottom: 1px solid #eee; padding: 10px 0; }
        .task-item > div { flex-grow: 1; }
        .task-item .completed { text-decoration: line-through; color: #888; }
        .actions a, .actions form { display: inline-block; margin-left: 10px; }
        .actions button { border: none; background: none; color: red; cursor: pointer; padding: 0; }
        .btn { display: inline-block; padding: 8px 15px; margin-top: 10px; text-decoration: none; border: 1px solid #ccc; border-radius: 5px; background-color: #f8f9fa; color: #333; }
        .btn-primary { background-color: #007bff; color: white; border-color: #007bff; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border: 1px solid #c3e6cb; border-radius: 5px; }
        .pagination { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>

        @if ($tasks->count() > 0)
            <ul class="task-list">
                @foreach ($tasks as $task)
                    <li class="task-item">
                        <div>
                            <h3 class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</h3>
                            @if ($task->due_date)
                                <small>Due Date: {{ $task->due_date->format('Y-m-d') }}</small><br>
                            @endif
                            @if ($task->priority)
                                <small>Priority: {{ ucfirst($task->priority) }}</small><br>
                            @endif
                            @if ($task->category)
                                <small>Category: {{ $task->category }}</small>
                            @endif
                            <p class="{{ $task->completed ? 'completed' : '' }}">{{ $task->description }}</p>
                        </div>
                        <div class="actions">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm">View</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $tasks->links() }}
        @else
            <p>No tasks yet. Add one!</p>
        @endif
    </div>
</body>
</html>