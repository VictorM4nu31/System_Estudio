<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_academic_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('tutor_id');
            $table->string('school');
            $table->string('enrollment');
            $table->string('grade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tutor_academic_data');
    }
};
