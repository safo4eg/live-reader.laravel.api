<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequests;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    public function store(BookStoreRequest $request)
    {
        $book = Book::create($request->safe()->all());
        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(BookUpdateRequests $request, Book $book)
    {
        $book->update($request->safe()->all());
        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, Response::HTTP_NO_CONTENT );
    }
}
