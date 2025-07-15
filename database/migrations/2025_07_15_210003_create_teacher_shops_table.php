<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('guild_id');
            $table->unsignedBigInteger('teacher_id');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('teacher_shops');
    }
};
