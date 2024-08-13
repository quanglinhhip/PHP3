<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'game_title' => 'required|string|max:255',
            'cover_art' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'developer' => 'required|string|max:255',
            'release_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'genre' => 'required|string|max:100',
        ];
    }
}
