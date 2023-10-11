<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Strategy\SearchBy\Date;
use App\Strategy\SearchBy\Id;
use App\Strategy\SearchBy\UserName;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Context
{
    public function __construct(private array $keyValueSearchParameter)
    {
    }

    /**
     * @throws \Exception
     */
    public function searchBy($posts): Builder|Collection
    {
        return  match (key($this->keyValueSearchParameter)) {
            'date' => (new Date())($this->keyValueSearchParameter, $posts),
            'id' => (new Id())($this->keyValueSearchParameter, $posts),
            'user_name' => (new UserName())($this->keyValueSearchParameter, $posts),
            default => throw new \Exception('Unexpected search value'),
        };
    }
}
