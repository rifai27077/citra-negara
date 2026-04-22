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
        Schema::table('beritas', function (Blueprint $table) {
            $table->text('excerpt')->nullable()->after('slug');
            $table->string('category', 50)->nullable()->after('image');
            $table->enum('jenjang', ['umum', 'smk', 'smp', 'sma'])->default('umum')->after('category');
            $table->foreignId('author_id')->nullable()->constrained('users')->onDelete('cascade')->after('published_at');
            
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
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn(['excerpt', 'category', 'jenjang', 'author_id']);
        });
    }
};
