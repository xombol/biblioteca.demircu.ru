<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
       // $publishers = Publisher::all();
       // return PublisherResource::collection($publishers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(PublisherRequest $request)
    {
        $publishers = Publisher::query()->create($request->validated());

        $token = $publishers->createToken($publishers->name);
        $publishers["token"] = $token->plainTextToken;

        return [$publishers];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Publisher $publisher)
    {
        $data = $publisher->books()->paginate(5);
        $count_books = $publisher->books()->count();

        return view('admin.pages.publisher', compact(['data', 'publisher', 'count_books']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return PublisherResource
     */
    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->all());

        return new PublisherResource($publisher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return response(null, 204);
    }

    /**
     * List the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $books = $request->user()->books;

        if (count($books) == 0) {
            return response()->json(['message' => 'list in empty!']);
        }
        return response()->json($books);
    }

    public function fetch_data(Request $request, Publisher $publisher)
    {
        if ($request->ajax()) {

            $data = $publisher->books()->paginate(5);

            return view('admin.layouts.components.pagination_data_publish', compact('data'))->render();

        }
    }

}
