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
        Schema::table('daftar_hargas', function (Blueprint $table) {
            $table->decimal('pendaftaran', 15, 2)->nullable()->after('price');
            $table->decimal('daftar_ulang', 15, 2)->nullable()->after('pendaftaran');
            $table->decimal('total', 15, 2)->nullable()->after('daftar_ulang');
            $table->decimal('spp', 15, 2)->nullable()->after('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_hargas', function (Blueprint $table) {
            $table->dropColumn(['pendaftaran', 'daftar_ulang', 'total', 'spp']);
        });
    }
};
