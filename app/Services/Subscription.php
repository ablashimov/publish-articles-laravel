<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Subscription as SubscriptionModel;
use Illuminate\Support\Facades\Auth;

class Subscription
{
    public function store(string $name, int $cost, int $posts_count)
    {
        $user = Auth::user();
        if ($user->hasRole('admin') && $user->isAbleTo('create-post')) {
            SubscriptionModel::create([
                'name' => $name,
                'cost' => $cost,
                'posts_count' => $posts_count,
            ]);
        }
    }
}
