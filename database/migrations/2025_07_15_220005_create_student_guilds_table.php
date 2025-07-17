<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_guilds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->timestamp('joined_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('student_guilds');
    }
};
