<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Main page + catalog
     *
     * @return string
     */

    public function index()
    {
        $books = Book::query()->paginate(5);

        return view('admin.pages.home', ['books' => $books]);
    }

    /**
     * Pagination for the book catalog
     *
     * @return string
     */
    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::query()->paginate(5);

            return view('admin.layouts.components.pagination_data', ['books' => $books])->render();
        }
    }
}
