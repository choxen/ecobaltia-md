<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class SearchBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => "nullable"
        ];
    }
}
