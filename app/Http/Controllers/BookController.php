<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // 1° STEP!!! la index deve mostrare tutti gli elementi che sono sul database
     //  e facciamo riferimento alla views index.blade.php
    public function index()
    {
      // ci andiamo a prendere tutti gli elementi della nostra tabella
       $books=Book::all();
       // e andiamo ad iniettare nella view tutta il nostro array di libri
       // e possiamo scriverlo anche cosi: return view("index", ["books" => $books]);
       return view("index",compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $book = new Book;
        $book->title = $data['title'];





        $book->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 2° STEP!!!  in show ci viene automaticamente iniettato l id del libro
     // e facciamo riferimento alla views show.blade.php
    public function show($id)
    {
       $book = Book::find($id); // SELECT * FROM books WHERE id = $id;
       return view("show", ["book => $book"]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
