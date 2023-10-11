<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Subscription\PaymentRequest;
use App\Services\Payment\Method;
use Illuminate\Http\Response;
use App\DTO\SuccessResponse as DtoResponse;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __invoke(PaymentRequest $paymentRequest, Method $paymentMethod)
    {
        $paymentMethod(Auth::user(), $paymentRequest);

        return response()->json((new DtoResponse)->toArray('success', true), Response::HTTP_OK);
    }

}
