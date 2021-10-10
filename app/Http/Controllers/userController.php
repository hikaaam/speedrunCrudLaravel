<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = User::with('books')->paginate(10);
            return Response([
                "success" => true,
                "data" => $user
            ]);
        } catch (\Throwable $th) {
            return Response(
                [
                    "success" => true,
                    "message" => $th->getMessage()
                ],
                500
            );
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
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
            ];
            $user = User::create($data);
            return Response([
                "success" => true,
                "data" => $user
            ]);
        } catch (\Throwable $th) {
            return Response(
                [
                    "success" => true,
                    "message" => $th->getMessage()
                ],
                500
            );
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
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
            ];
            $user = User::findOrFail($id);
            $user->update($data);
            return Response([
                "success" => true,
                "data" => "berhasil update data"
            ]);
        } catch (\Throwable $th) {
            return Response(
                [
                    "success" => true,
                    "message" => $th->getMessage()
                ],
                500
            );
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
            $user = User::findOrFail($id);
            $user->delete();
            return Response([
                "success" => true,
                "data" => "berhasil hapus data"
            ]);
        } catch (\Throwable $th) {
            return Response(
                [
                    "success" => true,
                    "message" => $th->getMessage()
                ],
                500
            );
        }
    }
}
