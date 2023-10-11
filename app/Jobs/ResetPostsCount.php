<?php

declare(strict_types=1);

namespace App\Jobs;

use App;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class ResetPostsCount implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function handle(): void
    {
        $users = User::get();
        foreach ($users as $user) {
            try {
                $user->update(['posts_count' => 0]);
            } catch (Exception $e) {
                Log::info('posts_count can not update to user_id:' . $user->id);
            }
        }
    }
}
