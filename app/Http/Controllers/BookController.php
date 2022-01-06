<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function search(Request $request) {
        $keyword = $request->keyword;

      //  $books = Book::
    }

    public function index()
    {
        echo 'toi là nam nè';
    }
}
