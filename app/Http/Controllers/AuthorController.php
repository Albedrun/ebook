<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();

        return response()->json([
            "message" => "Load success",
            "data" => $data
        ], 200);

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
        $data = $request->validate([
            "title"=>['required'],
            "description"=>['required'],
            "author"=>['required'],
            "publisher"=>['required'],
            "date_of_issue"=>['required']

        ]);
        Book::create($data);

        $data_akhir = Book::all();
        return response()->json([
            "message" => "Store success",
            "data" => $data_akhir
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Book::find($id);
        if($data)
        {
            return $data;
        }else{
            return ["message" => "Data Not Found"];
        }

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
        $data=Book::find($id);
        if($data)
        {
            $data->update($request->all());
            return response()->json([
                "message" => "Update Success",
                "data" => $data
            ], 202);
        }else{
            return [ "message" => "Data Not Found"];
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
        $data = Book::find($id);
        if($data)
        {
            $data = Book::destroy($id);
            return response()->json([
                "message" => "Delete Success",
            ], 203);
        }else{
            return ["message" => "Data Not Found"];
        }
    }
}
