<?php

class BookTest extends TestCase
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
    public function testShouldReturnAllBooks()
    {
        $this->get('books', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' => [
                    'id',
                    'title',
                    'description',
                    'price',
                    'author_id',
                ],
            ],
        ]);
    }

    /**
     * /products/id [GET].
     */
    public function testShouldReturnBook()
    {
        $this->get('books/2', []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                'id',
                'title',
                'description',
                'price',
                'author_id',
                ],
            ]
        );
    }

    /**
     * /products [POST].
     */
    public function testShouldCreateProduct()
    {
        $parameters = [
            'title' => 'Test3 Title',
            'description' => 'Test3 Description',
            'price' => '2',
            'author_id' => '15',
        ];
        $this->post('book/add', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                'id',
                'title',
                'description',
                'price',
                'author_id',
                ],
            ]
        );
    }

    /**
     * /products/id [PUT].
     */
    public function testShouldUpdateProduct()
    {
        $parameters = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'price' => '3',
            'author_id' => '16',
        ];
        $this->put('books/update/3', $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                'title',
                'description',
                'price',
                'author_id',
                ],
            ]
        );
    }

    /**
     * /products/id [DELETE].
     */
    public function testShouldDeleteProduct()
    {
        $this->delete('books/delete/4', [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' => [
                'id',
                'title',
                'description',
                'price',
                'author_id',
                ],
            ]
        );
    }
}
