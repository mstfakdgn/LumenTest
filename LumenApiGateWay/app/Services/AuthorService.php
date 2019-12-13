<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class AuthorService
{
    use ConsumeExternalServices;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/authors');
    }

    public function addAuthor($formParams)
    {
        return $this->performRequest('POST', '/author/add', $formParams);
    }

    public function showAuthor($authorId)
    {
        return $this->performRequest('GET', "authors/{$authorId}");
    }

    public function updateAuthor($formUpdateParams, $authorId)
    {
        return $this->performRequest('PUT', "/authors/update/{$authorId}", $formUpdateParams);
    }

    public function deleteAuthor($authorId)
    {
        return $this->performRequest('DELETE', "/authors/delete/{$authorId}");
    }
}
