<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_of_writing' => 'datetime:Y-m-d',
        'date_of_publication' => 'datetime:Y-m-d'
    ];

    protected $with = ['genre', 'author'];

    protected $hidden = [
        'genre_id',
        'author_id',
        'created_at',
        'updated_at'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}

