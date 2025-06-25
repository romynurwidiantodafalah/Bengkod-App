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
        Schema::table('periksas', function (Blueprint $table) {
            $table->integer('no_antrian')->nullable()->after('jadwal_id');
            $table->string('status')->default('Belum diperiksa')->after('no_antrian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropColumn('no_antrian');
            $table->dropColumn('status');
        });
    }
};
