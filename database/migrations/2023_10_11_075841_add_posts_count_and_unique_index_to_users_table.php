<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('posts_count')->nullable();
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
//            $table->dropForeign('users_subscription_id_foreign');
            $table->dropColumn('posts_count');
            $table->dropUnique('users_name_unique');
        });
    }
};
