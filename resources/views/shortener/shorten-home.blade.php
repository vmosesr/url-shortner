<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        input[type=text] { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; box-sizing: border-box; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        <form action="{{ route('shortener.shorten') }}" method="POST">
            @csrf
            <div>
                <label for="original_url">Enter URL:</label>
                <input type="text" id="original_url" name="original_url" placeholder="https://www.example.com">
                @error('original_url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Shorten URL</button>
        </form>
    </div>
</body>
</html>