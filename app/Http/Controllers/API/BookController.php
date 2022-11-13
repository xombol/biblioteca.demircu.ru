<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use Bitrix\Blog\Item\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $posts = Book::all();
        return BookResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookRequest $request)
    {

        $book = Book::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'publisher_id' => $request->user()->id
        ]);

        foreach ($request->authors as $author) {

            $author_add = Author::query()->firstOrCreate(['name' => $author["name"]]);

            $book->authors()->attach($author_add);
        }

        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BookRequest $request, Book $book)
    {
        $author_ids = [];

        foreach ($request->authors as $author) {

            $author_ids[] = Author::query()->firstOrCreate(['name' => $author["name"]])->id;

        }

        if ($author_ids) {
            $book->authors()->sync($author_ids);
        }

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response(null, 204);
    }

}
