<?php

namespace App\Http\Requests\Book;

trait BookRequestTrait
{
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
