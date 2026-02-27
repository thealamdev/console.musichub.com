<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'lyrics',
        'slug',
        'description',
        'artist',
        'writer',
        'composer',
        'genre',
        'answer_id',
        'category_id',
        'album',
        'duration',
        'release_date',
        'language',
        'cover_image',
        'audio_url',
        'is_published',
    ];

    /**
     * Get the question associlated with the model
     * @return BelongsTo<Song, Song>
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(related: Song::class, foreignKey: 'answer_id');
    }

    /**
     * Get the answer associated with the model.
     * @return HasMany<Song, Song>
     */
    public function answers(): HasMany
    {
        return $this->hasMany(related: Song::class, foreignKey: 'answer_id');
    }
}
