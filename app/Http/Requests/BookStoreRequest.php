<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

//    public function prepareForValidation()
//    {
//        $this->merge([
//            'date_of_writing' => Carbon::make($this->date_of_writing)->format('Y-m-d'),
//            'date_of_publication' => Carbon::make($this->date_of_publication)->format('Y-m-d'),
//        ]);
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:127'],
            'description' => ['required', 'string'],
            'isbn' => ['required', 'string', 'max:17', 'regex:#\d{3}-\d-\d{3}-\d{5}-\d#'],
            'genre_id' => ['required', 'numeric'],
            'author_id' => ['required', 'numeric'],
            'date_of_writing' => ['nullable', 'before:tomorrow'],
            'date_of_publication' => ['nullable', 'before:tomorrow'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'isbn' => 'ISBN',
            'genre_id' => 'Жанр',
            'author_id' => 'Автвор',
            'date_of_writing' => 'Дата написания'
        ];
    }

    public function messages()
    {
        return [
            'isbn.regex' => ':attribute должен содержать цифры и знак (-) в формате ###-#-###-#####-#'
        ];
    }
}
