<?php

namespace App\Http\Requests\Book;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequests extends FormRequest
{
    use BookRequestTrait;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['nullable', 'string', 'max:127'],
            'description' => ['nullable', 'string'],
            'isbn' => ['nullable', 'string', 'max:17',
                'regex:#\d{3}-\d-\d{3}-\d{5}-\d#', 'unique:'.Book::class],
            'genre_id' => ['nullable', 'numeric'],
            'author_id' => ['nullable', 'numeric'],
            'date_of_writing' => ['nullable', 'before:tomorrow'],
            'date_of_publication' => ['nullable', 'before:tomorrow'],
        ];
    }
}
