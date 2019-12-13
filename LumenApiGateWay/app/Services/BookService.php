<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class BookService
{
    use ConsumeExternalServices;

    public $baseUri;
    public $secret;

    public function __construct(AuthorService $authorService)
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    public function showBooks()
    {
        return $this->performRequest('GET', '/books');
    }

    public function showBook($bookId)
    {
        return $this->performRequest('GET', "/books/{$bookId}");
    }

    public function addBook($data)
    {
        return $this->performRequest('POST', '/book/add', $data);
    }

    public function updateBook($data, $bookId)
    {
        return $this->performRequest('PUT', "/books/update/{$bookId}", $data);
    }

    public function deleteBook($bookId)
    {
        return $this->performRequest('DELETE', "/books/delete/{$bookId}");
    }
}
