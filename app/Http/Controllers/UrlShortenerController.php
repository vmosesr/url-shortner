<?php

namespace App\Http\Controllers;

use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    public function linker()
    {
        return view('shortener.shorten-home');
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $originalUrl = $request->input('original_url');
        $shortCode = Str::random(6); // Generate a random short code

        // Check if the original URL already exists
        $shortenedUrl = ShortenedUrl::where('original_url', $originalUrl)->first();

        if (!$shortenedUrl) {
            // Ensure the short code is unique (though Str::random is unlikely to collide quickly)
            while (ShortenedUrl::where('short_code', $shortCode)->exists()) {
                $shortCode = Str::random(6);
            }

            $shortenedUrl = ShortenedUrl::create([
                'original_url' => $originalUrl,
                'short_code' => $shortCode,
            ]);
        }

        return view('shortener.shortened', ['shortenedUrl' => $shortenedUrl]);
    }

    public function redirect($code)
    {
        $shortenedUrl = ShortenedUrl::where('short_code', $code)->firstOrFail();

        return redirect($shortenedUrl->original_url);
    }
}
