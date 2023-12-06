<?php

namespace App\Http\Requests\Tag;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TagIdArrayRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tags' => 'required|array|min:3|max:5',
            'tags.*' => 'integer|exists:App\Models\Tag,id',
        ];
    }
}
