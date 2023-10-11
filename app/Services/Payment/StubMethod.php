<?php
declare(strict_types=1);

namespace App\Services\Payment;

use App\Http\Requests\Subscription\PaymentRequest;
use App\Models\Subscription;
use Illuminate\Contracts\Auth\Authenticatable;

class StubMethod implements Method
{
    public function __invoke(Authenticatable|null $user, PaymentRequest $paymentRequest)
    {
        $user->update([
            'posts_count' => Subscription::firstWhere('cost', $paymentRequest->cost)->posts_count
        ]);
    }
}
