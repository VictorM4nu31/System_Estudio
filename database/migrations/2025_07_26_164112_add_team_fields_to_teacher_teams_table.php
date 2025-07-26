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
        Schema::table('teacher_teams', function (Blueprint $table) {
            $table->string('team_type')->nullable()->after('description');
            $table->integer('max_members')->nullable()->after('team_type');
            $table->date('start_date')->nullable()->after('max_members');
            $table->date('end_date')->nullable()->after('start_date');
            $table->string('status')->default('active')->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher_teams', function (Blueprint $table) {
            $table->dropColumn(['team_type', 'max_members', 'start_date', 'end_date', 'status']);
        });
    }
};
