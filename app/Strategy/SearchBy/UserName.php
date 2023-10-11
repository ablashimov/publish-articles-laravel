<?php
declare(strict_types=1);

namespace App\Strategy\SearchBy;

use App\Strategy\SearchPosts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserName implements SearchPosts
{
    public function __invoke(array $searchParameter, Builder $posts): Builder|Collection
    {
        return $posts
            ->where('user_name', $searchParameter)
            ->orderBy('user_name','asc')
            ->get();
    }
}
