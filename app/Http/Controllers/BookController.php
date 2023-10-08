<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        return BookResource::collection(Book::paginate());
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function store(BookRequest $request, UploadController $uploadController)
    {
        $ss = $request->all();
        $ss['book_url'] = $uploadController->upload($request, 'books', '');
        return new BookResource(Book::create($ss));
    }

    public function update(BookRequest $request, Book $book)
    {
        return $book->update($request->all());
    }

    public function destroy($id)
    {
        return Book::find($id)->delete();
    }

}
