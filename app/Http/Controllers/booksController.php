<?php

namespace App\Http\Controllers;

use App\Models\books;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $book = books::with('author')->paginate(10);
            return Response([
                "success" => true,
                "data" => $book,
            ], 200);
        } catch (\Throwable $th) {
            return Response([
                "success" => false,
                "message" => $th->getMessage()
            ], 500);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [
                "title" => $request->title,
                "author" => $request->author,
            ];
            $book = books::create($data);
            return Response([
                "success" => true,
                "data" => $book
            ], 200);
        } catch (\Throwable $th) {
            return Response([
                "success" => false,
                "message" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $data = [
                "title" => $request->title,
            ];
            $book = books::findOrFail($id);
            $book->update($data);
            return Response([
                "success" => true,
                "data" => "berhasil update buku"
            ], 200);
        } catch (\Throwable $th) {
            return Response([
                "success" => false,
                "message" => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $book = books::findOrFail($id);
            $book->delete($id);
            return Response([
                "success" => true,
                "data" => "berhasil hapus buku"
            ], 200);
        } catch (\Throwable $th) {
            return Response([
                "success" => false,
                "message" => $th->getMessage()
            ], 500);
        }
    }
}
