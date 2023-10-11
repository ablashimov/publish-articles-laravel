<?php
declare(strict_types=1);

namespace App\Strategy\SearchBy;

use App\Strategy\SearchPosts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
class Date implements SearchPosts
{
    public function __invoke(array $searchParameter, Builder $posts): Builder|Collection
    {
        return $posts
            ->whereDate('created_at', '=', $searchParameter)
            ->orderBy('created_at','asc')
            ->get();
    }
}
