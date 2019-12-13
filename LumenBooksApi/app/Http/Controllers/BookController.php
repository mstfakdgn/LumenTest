<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);

        return $this->successResponse($book);
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse($book);
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1',
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($bookId);

        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $book->save();

        return $this->successResponse($book);
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function delete($bookId)
    {
        $book = Book::findOrFail($bookId);

        $book->delete();

        return $this->successResponse($book);
    }
}
