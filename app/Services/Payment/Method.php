<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\Http\Requests\Subscription\PaymentRequest;
use Illuminate\Contracts\Auth\Authenticatable;

interface Method
{
    public function __invoke(Authenticatable|null $user, PaymentRequest $paymentRequest);
}
