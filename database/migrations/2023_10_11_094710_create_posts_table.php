<?php

use App\Enums\Statuses;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->foreign('user_name')
                ->references('name')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('content');
            $table->enum('status', Statuses::getAllStatuses())
                ->default(Statuses::INACTIVE()->value);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
