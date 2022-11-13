<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $data = Book::query()->paginate(5);


        return view('admin.pages.home', compact(['data']));
    }

    public function fetch_data(Request $request)

    {

        if ($request->ajax()) {

            $data = Book::query()->paginate(5);


            return view('admin.layouts.components.pagination_data', compact('data'))->render();

        }


    }
}
