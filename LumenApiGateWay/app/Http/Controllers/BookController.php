<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;

    public $bookService;
    public $authorService;

    /**
     * Create a new controller instance.
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->showBooks());
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function show($bookId)
    {
        return $this->successResponse($this->bookService->showBook($bookId));
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $this->authorService->showAuthor($request->author_id);

        return $this->successResponse($this->bookService->addBook($request->all()));
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {
        return $this->successResponse($this->bookService->updateBook($request->all(), $bookId));
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function delete($bookId)
    {
        return $this->successResponse($this->bookService->deleteBook($bookId));
    }
}
