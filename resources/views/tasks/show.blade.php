<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        h1 { margin-bottom: 20px; }
        .task-details { margin-bottom: 20px; }
        .task-details p { margin-bottom: 10px; }
        .btn { display: inline-block; padding: 8px 15px; margin-top: 10px; text-decoration: none; border: 1px solid #ccc; border-radius: 5px; background-color: #f8f9fa; color: #333; }
        .btn-primary { background-color: #007bff; color: white; border-color: #007bff; }
        .btn-secondary { color: #333; background-color: #e2e6ea; border-color: #e2e6ea; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Details</h1>
        <div class="task-details">
            <h2>{{ $task->title }}</h2>
            @if ($task->due_date)
                <p><strong>Due Date:</strong> {{ $task->due_date->format('Y-m-d') }}</p>
            @endif
            <p><strong>Status:</strong> {{ $task->completed ? 'Completed' : 'Pending' }}</p>
            @if ($task->priority)
                <p><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
            @endif
            @if ($task->category)
                <p><strong>Category:</strong> {{ $task->category }}</p>
            @endif
            <p><strong>Description:</strong></p>
            <p>{{ $task->description ?? 'No description provided.' }}</p>
            <p><strong>Created At:</strong> {{ $task->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $task->updated_at }}</p>
        </div>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>