<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use HasUlids, SoftDeletes;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'songs';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'user_id',
        'lyrics',
        'genre',
        'slug',
        'explanation',
        'writer',
        'answer_id',
        'category_id',
    ];

    /**
     * Get the user associated with the model.
     * @return BelongsTo<User, Song>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    /**
     * Get the category associated with the model.
     * @return BelongsTo<Category, Song>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class, foreignKey: 'category_id');
    }

    /**
     * Get the answer song associated with this song.
     * A song can be the answer to another song (especially interrogative songs).
     *
     * @return BelongsTo<Song, Song>
     */
    public function answer(): BelongsTo
    {
        return $this->belongsTo(Song::class, 'answer_id');
    }
}
