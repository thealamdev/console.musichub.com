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
            $table->string(column: 'title');
            $table->text(column: 'lyrics');
            $table->string(column: 'slug')->unique()->nullable();
            $table->text(column: 'description')->nullable();
            $table->string(column: 'artist')->nullable();
            $table->string(column: 'writer')->nullable();
            $table->string(column: 'composer')->nullable();
            $table->enum(column: 'genre', allowed: GenreEnum::values());
            $table->foreignUlid(column: 'category_id')->constrained(table: 'song_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->ulid(column: 'answer_id')->nullable();
            $table->foreign(columns: 'answer_id')->references(columns: 'id')->on(table: 'songs')->nullOnDelete();
            $table->string(column: 'album')->nullable();
            $table->integer(column: 'duration')->nullable();
            $table->date(column: 'release_date')->nullable();
            $table->string(column: 'language')->nullable();
            $table->string(column: 'cover_image')->nullable();
            $table->string(column: 'audio_url')->nullable();
            $table->boolean(column: 'is_published')->default(value: false);
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
