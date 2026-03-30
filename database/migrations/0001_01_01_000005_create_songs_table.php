<?php

use App\Enum\GenreEnum;
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
        Schema::create(table: 'songs', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->foreignUlid(column: 'user_id')->constrained(table: 'users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string(column: 'title');
            $table->text(column: 'lyrics');
            $table->string(column: 'slug')->unique()->nullable();
            $table->text(column: 'explanation')->nullable();
            $table->string(column: 'writer')->nullable();
            $table->enum(column: 'genre', allowed: GenreEnum::values());
            $table->foreignUlid(column: 'category_id')->constrained(table: 'song_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->ulid(column: 'answer_id')->nullable();
            $table->foreign(columns: 'answer_id')->references(columns: 'id')->on(table: 'songs')->nullOnDelete();
            $table->string(column: 'cover_image')->nullable();
            $table->string(column: 'audio_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'songs');
    }
};
