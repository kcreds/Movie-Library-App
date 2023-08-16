<?php

namespace App\Http\Requests;

use App\Enums\MovieStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class StoreMovieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'image' => ['image'],
            'slug' => ['required', Rule::unique('movies')->ignore($this->movie)],
            'length' => ['required'],
            'director' => ['required'],
            'screenplay' => ['required'],
            'genre' => ['required'],
            'production' => ['required'],
            'premiere' => ['required'],
            'description' => ['required', 'min:5'],
            'score' => ['required'],
            'status' => ['required']
        ];
    }
}
