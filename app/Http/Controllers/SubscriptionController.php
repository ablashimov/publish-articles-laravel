<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\SuccessResponse;
use App\Services\Subscription as SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    public function store(Request $request, SubscriptionService $sebscription): JsonResponse
    {
        $sebscription->store($request->name, (int) $request->cost, (int) $request->posts_count);

        return response()->json((new SuccessResponse)->toArray('success', true), 201);

    }
}
