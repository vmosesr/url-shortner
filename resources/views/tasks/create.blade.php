<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        h1 { margin-bottom: 20px; }
        form label { display: block; margin-bottom: 5px; }
        form input[type=text], form textarea, form select { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; box-sizing: border-box; }
        form button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .btn-secondary { display: inline-block; padding: 8px 15px; margin-top: 10px; text-decoration: none; border: 1px solid #ccc; border-radius: 5px; background-color: #f8f9fa; color: #333; }
        .error { color: red; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="due_date">Due Date (optional):</label>
                <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}">
                @error('due_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="priority">Priority (optional):</label>
                <select id="priority" name="priority">
                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }} selected>Medium</option>
                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                </select>
                @error('priority')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="category">Category (optional):</label>
                <input type="text" id="category" name="category" value="{{ old('category') }}">
                @error('category')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>