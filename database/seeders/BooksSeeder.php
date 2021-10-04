<?php

namespace Database\Seeders;

use App\Http\Controllers\BookConstant;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->name = "Lập trình web";
        $book->desc = "Sach lap trinh web bang php vs mysql";
        $book->image = "book.jpg";
        $book->status = BookConstant::BOOK_BORROWED;
        $book->price = "200000";
        $book->save();

        $book = new Book();
        $book->name = "Phan tich thiet ke";
        $book->desc = "Sach lap trinh web";
        $book->image = "book.jpg";
        $book->status = BookConstant::BOOK_BORROWED;
        $book->price = "150000";
        $book->save();

        $book = new Book();
        $book->name = "Lap trinh nang cao";
        $book->desc = "Sach lap trinh web nang cao";
        $book->image = "book.jpg";
        $book->status = BookConstant::BOOK_BORROWED;
        $book->price = "200000";
        $book->save();

    }
}
