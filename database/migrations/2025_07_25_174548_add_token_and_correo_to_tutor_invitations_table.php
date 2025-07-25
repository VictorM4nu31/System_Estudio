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
        Schema::table('tutor_invitations', function (Blueprint $table) {
            $table->string('token', 64)->unique()->after('id');
            $table->string('correo_tutor')->after('student_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutor_invitations', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('correo_tutor');
        });
    }
};
