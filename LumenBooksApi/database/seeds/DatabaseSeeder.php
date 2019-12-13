<?php

use App\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(Book::class, 150)->create();
    }
}
