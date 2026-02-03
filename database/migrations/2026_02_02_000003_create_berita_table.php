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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->string('kategori', 50)->nullable();
            $table->enum('jenjang', ['umum', 'smk', 'smp', 'sma'])->default('umum');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            // Indexes
            $table->index('jenjang');
            $table->index('is_published');
            $table->index(['jenjang', 'is_published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
