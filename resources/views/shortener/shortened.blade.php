<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortened URL</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        .short-link { font-size: 1.2em; margin-top: 20px; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .back-link { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shortened URL</h1>
        <div class="short-link">
            Your shortened URL is: <a href="{{ url('/' . $shortenedUrl->short_code) }}" target="_blank">{{ url('/' . $shortenedUrl->short_code) }}</a>
        </div>
        <div class="back-link">
            <a href="{{ route('shortener.shorten-home') }}">Shorten another URL</a>
        </div>
    </div>
</body>
</html>