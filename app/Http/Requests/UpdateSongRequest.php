<?php

namespace App\Http\Requests;

use App\Enum\GenreEnum;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSongRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lyrics' => 'required|string',
            'genre' => 'required|in:' . implode(separator: ',', array: GenreEnum::values()),
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'answer_id' => 'nullable',
            'explanation' => 'nullable|string',
            'writer' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'audio_url' => 'nullable|file|mimes:mp3,wav',
        ];
    }
}
