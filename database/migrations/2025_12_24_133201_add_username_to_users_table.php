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
            // Tambah kolom username (unique)
            $table->string('username')->unique()->after('id');
            
            // Email tidak perlu unique lagi (optional)
            $table->dropUnique(['email']); // Hapus unique constraint
            $table->string('email')->nullable()->change(); // Email jadi optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->string('email')->unique()->nullable(false)->change();
        });
    }
};