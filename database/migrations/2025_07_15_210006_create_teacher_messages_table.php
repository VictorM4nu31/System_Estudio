<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_messages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->unsignedBigInteger('guild_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('recipient_id');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('teacher_messages');
    }
};
