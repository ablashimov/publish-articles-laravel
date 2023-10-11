<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\SuccessResponse;
use App\Enums\Statuses;
use App\Http\Requests\Post\SearchRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Services\Post as PostService;
use App\Strategy\Context;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(StoreRequest $storeRequest, PostService $postService)
    {
        $postService->store($storeRequest->get('content'));

        return response()->json((new SuccessResponse)->toArray('success', true), 201);
    }

    public function search(SearchRequest $searchRequest)
    {
        $requestData = $searchRequest->input();
        $posts = Post::where('status', Statuses::ACTIVE());
        $context = new Context($requestData);


        return response()->json((new SuccessResponse)->toArray('posts', $context->searchBy($posts)));
    }

    public function index(Request $request)
    {
        $filterByUserName = $request->input('filter');

        return response()->json(
            (new SuccessResponse)->toArray(
                'posts',
                Post::where('status', Statuses::ACTIVE())
                    ->orderBy('user_name', $filterByUserName)
                    ->get()
            )
        );
    }
}
