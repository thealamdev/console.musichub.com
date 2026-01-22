<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'category_id' => 'required|exists:song_categories,id',
            'slug' => 'nullable|string|max:255|unique:songs,slug',
            'description' => 'nullable|string',
            'artist' => 'nullable|string|max:255',
            'writer' => 'nullable|string|max:255',
            'composer' => 'nullable|string|max:255',
            'album' => 'nullable|string|max:255',
            'duration' => 'nullable|integer|min:1',
            'release_date' => 'nullable|date',
            'language' => 'nullable|string|max:50',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'audio_url' => 'nullable|file|mimes:mp3,wav',
            'is_published' => 'nullable|boolean',
        ];
    }

    /**
     * Sanetize input values
     * @return array<string, mixed>
     */
    public function sanitizedValues(): array
    {
        return [
            'title'         => $this->input(key: 'title'),
            'lyrics'        => $this->input(key: 'lyrics'),
            'category_id'   => $this->input(key: 'category_id'),
            'slug'          => $this->input(key: 'slug'),
            'description'   => $this->input(key: 'description'),
            'artist'        => $this->input(key: 'artist'),
            'writer'        => $this->input(key: 'writer'),
            'composer'      => $this->input(key: 'composer'),
            'album'         => $this->input(key: 'album'),
            'duration'      => $this->input(key: 'duration'),
            'release_date'  => $this->input(key: 'release_date'),
            'language'      => $this->input(key: 'language'),
            'is_published'  => $this->input(key: 'is_publishdefault: ed', default: false),
        ];
    }
}
