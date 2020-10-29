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
       // l'abbreviazione con compact puo essere usata in tutte le route
       return view("index",compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 3° STEP!!! create deve mostrare un forum di inserimento
    // e facciamo riferimento alla views create.blade.php
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
     // 4°STEP!!! parte della store ce la scrive gia laravel e nella Store
     // ci viene iniettato un oggetto request e ha tutti i dati che ci
     // arrivano da form create
    public function store(Request $request)

    // il tutto arriva sottoforma di array associativo e lo andiamo a salvare
    // all'interno di una variabile data
        $data = $request->all();
      // aggiungiamo la nostra validazione campo per campo
        $request->validate([
          'isbn' => "required|unique:books|max:13",
          'title' => "required|max:30",
          'author' => "required|max:50",
          'genre' => "required|max:30",
          'edition' => "required|max:50",
          'description' => "required|2500",
          'pages' => "required|nteger",
          'image' => "required",
          'year' => "required|date",
        ]);

        // andiamo a creare un nuovo model un nuovo oggetto che sara
        // quello che poi andremo ainserire
        $book = new Book;
        $book->isbn = $data['isbn'];
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->genre = $data['genre'];
        $book->edition = $data['edition'];
        $book->description = $data['description'];
        $book->pages = $data['pages'];
        $book->image = $data['image'];
        $book->year = $data['year'];

        // ci permette di salvare il dato...
        $book->save();
        // ...e ci riindirizza alla pagina del libro appena inserito e ce lo mostrera
        return redirect()->route('books.show', $book);
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

     // 5° STEP!!! deve mostrare il form per evitare uno specifico libro
    public function edit($id)
    {
      // con fin andiamo a leggere il libro
        $book = Book::find($id);
      // facciamo il return di una view passandoci il libro
        return view("edit", ["book" => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // 6° STEP!!!
    public function update(Request $request, $id)
    {
      $data = $request->all();
    // aggiungiamo la nostra validazione campo per campo
      $request->validate([
        'isbn' => [
          "required",
          "max:13",
          Rule::unique('books')->ignore($id)
        ],
        'title' => "required|max:30",
        'author' => "required|max:50",
        'genre' => "required|max:30",
        'edition' => "required|max:50",
        'description' => "required|2500",
        'pages' => "required|nteger",
        'image' => "required",
        'year' => "required|date",
      ]);
      // invece di andare a fare un New book come nel create lo andiamo a pescare
      // nel database perche se siamo in update vuol dire che questo elemnto esiste gia
      $book = Book::find($id);


      $book->isbn = $data['isbn'];
      $book->title = $data['title'];
      $book->author = $data['author'];
      $book->genre = $data['genre'];
      $book->edition = $data['edition'];
      $book->description = $data['description'];
      $book->pages = $data['pages'];
      $book->image = $data['image'];
      $book->year = $data['year'];

      // ci permette di fare l update di tutto il book sopra...
      $book->update();
      // ...e ci riindirizza alla pagina del libro appena inserito e ce lo mostrera
      return redirect()->route('books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // 7° STEP!!!
     // gli viene iniettato l id quello che noi stiamo passando nel show blade in destroy...
    public function destroy($id)
    {
      // ...andiamo a cercare il libro...
      $book = Book::find($id);
      // ...lo cancelliamo...
      $book->delete();
      // ...facciamo un indirizzamento all'home page
      return redirect()->route("books.index");
    }
}
