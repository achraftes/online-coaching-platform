<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('password');
            $table->string('nick_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('profile_photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'nick_name',
                'gender',
                'country',
                'language',
                'time_zone',
                'profile_photo'
            ]);
        });
    }
};
