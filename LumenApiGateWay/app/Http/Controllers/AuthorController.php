<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    public $authorService;

    /**
     * Create a new controller instance.
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function show($authorId)
    {
        return $this->successResponse($this->authorService->showAuthor($authorId));
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        return $this->successResponse($this->authorService->addAuthor($request->all(), Response::HTTP_CREATED));
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $authorId)
    {
        return $this->successResponse($this->authorService->updateAuthor($request->all(), $authorId));
    }

    /**
     * @return Illuminate\Http\Response
     */
    public function delete($authorId)
    {
        return $this->successResponse($this->authorService->deleteAuthor($authorId));
    }
}
