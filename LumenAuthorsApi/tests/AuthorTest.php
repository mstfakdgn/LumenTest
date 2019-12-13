<?php

class AuthorTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    /**
     * /products [GET].
     */
    public function testShouldReturnAllAuthors()
    {
        $this->get('authors', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' => [
                    'name',
                    'gender',
                    'country',
                ],
            ],
        ]);
    }

    /**
     * /products/id [GET].
     */
    public function testShouldReturnAuthor()
    {
        $this->get('authors/5', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                    'name',
                    'gender',
                    'country',
                ],
            ]
        );
    }

    /**
     * /products [POST].
     */
    public function testShouldCreateAuthor()
    {
        $parameters = [
            'name' => 'all test create',
            'gender' => 'male',
            'country' => 'Türkiye',
        ];
        $this->post('/author/add', $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure(
            ['data' => [
                    'name',
                    'gender',
                    'country',
                ],
            ]
        );
    }

    /**
     * /products/id [PUT].
     */
    public function testShouldUpdateAuthor()
    {
        $parameters = [
            'name' => 'Updated all test',
            'gender' => 'male',
            'country' => 'Amerika',
        ];
        $this->put('authors/update/5', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                    'name',
                    'gender',
                    'country',
                ],
            ]
        );
    }

    /**
     * /products/id [DELETE].
     */
    public function testShouldDeleteAuthor()
    {
        $this->delete('authors/delete/50', [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                    'name',
                    'gender',
                    'country',
                ],
            ]
        );
    }
}
