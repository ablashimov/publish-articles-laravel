<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\Statuses;
use App\Http\Requests\Post\SearchRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Strategy\Context;
use Illuminate\Support\Facades\Auth;
use LengthException;
use Illuminate\Http\Request;

class PostsController
{
    public function store(StoreRequest $storeRequest)
    {
        $user = Auth::user();
        if ($user->posts_count <= 0) {
            throw new LengthException('Not enough posts in your subscription, please top up your account');
        }

        Post::create([
            'user_name' => $user->name,
            'content' => $storeRequest->get('content')
        ]);
        if ($user->posts_count > 0) {
            $user->update(['posts_count' => ($user->posts_count - 1)]);
        }

        return response()->json(['success' => true], 201);
    }

    public function search(SearchRequest $searchRequest)
    {
        $requestData = $searchRequest->input();
        $posts = Post::where('status', Statuses::ACTIVE());
        $context = new Context($requestData);


        return response()->json(['posts' => $context->searchBy($posts)]);
    }

    public function index(Request $request)
    {
        $filterByUserName = $request->input('filter');

        return response()->json([
            'posts' => Post::where('status', Statuses::ACTIVE())
                ->orderBy('user_name', $filterByUserName)
                ->get()
        ]);
    }
}
