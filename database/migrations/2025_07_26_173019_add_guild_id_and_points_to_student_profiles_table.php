<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('guild_id')->nullable()->after('student_id');
            $table->integer('points')->default(0)->after('guild_id');

            $table->foreign('guild_id')->references('id')->on('teacher_guilds')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            $table->dropForeign(['guild_id']);
            $table->dropColumn(['guild_id', 'points']);
        });
    }
};
