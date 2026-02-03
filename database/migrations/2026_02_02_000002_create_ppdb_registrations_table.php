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
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->string('nisn', 20);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('no_telepon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('sekolah_asal', 100);
            $table->text('alamat_sekolah');
            $table->enum('jenjang', ['smk', 'smp', 'sma']);
            $table->string('jurusan', 50)->nullable(); // Untuk SMK/SMA
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            // Indexes for filtering
            $table->index('jenjang');
            $table->index('status');
            $table->index(['jenjang', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
