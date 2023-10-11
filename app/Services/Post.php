<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use LengthException;

class Post
{
    public function store(string $content): void
    {
        $user = Auth::user();
        if ($user->posts_count <= 0) {
            throw new LengthException('Not enough posts in your subscription, please top up your account');
        }

        \App\Models\Post::create([
            'user_name' => $user->name,
            'content' => $content
        ]);
        if ($user->posts_count > 0) {
            $user->update(['posts_count' => ($user->posts_count - 1)]);
        }
    }
}
