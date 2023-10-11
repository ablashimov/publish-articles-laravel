<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;


class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer'],
            'date' => ['string'],
            'user_name' => ['string'],
        ];
    }
}
