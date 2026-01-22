<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
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
        'category_id',
        'album',
        'duration',
        'release_date',
        'language',
        'cover_image',
        'audio_url',
        'is_published',
    ];
}
