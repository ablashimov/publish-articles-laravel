<?php

declare(strict_types=1);

namespace App\Strategy;

use Illuminate\Database\Eloquent\Builder;
interface SearchPosts
{
    public function __invoke(array $searchParameter, Builder $posts);
}
