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
        Schema::table('teacher_events', function (Blueprint $table) {
            $table->string('location')->nullable()->after('description');
            $table->string('event_type')->nullable()->after('location');
            $table->integer('capacity')->nullable()->after('event_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher_events', function (Blueprint $table) {
            $table->dropColumn(['location', 'event_type', 'capacity']);
        });
    }
};
