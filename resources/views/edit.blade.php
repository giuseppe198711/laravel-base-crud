
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    {{-- a differenza del create nel form andiamo a scrivere la rotta books.update
    e ha un parametro che è il libro su cui dopo dovrà andare a fare l'aggiornamento sul database--}}
    {{-- il metodo edit ci sta iniettando il libro noi lo andremo a salvare nella variabile $book --}}
    <form action="{{route('books.update', $book->id)}}" method="POST">
      @csrf
      {{-- a differenza di create qui il metodo sara PUT e non POST --}}
      @method('PUT')

      <div class="">
        <label for="isbn">isbn</label>
        {{-- vado ad aggiungere a tutti gli input i value in modo che l utente
         sa gia i dati che c erano precedentemente--}}
        <input type="text" name="isbn" placeholder="isbn" id="isbn" value="{{ $book->title }}">
      </div>

      <div class="">
        <label for="title">title</label>
        <input type="text" name="title" placeholder="title" id="title" value="{{ $book->title }}">
      </div>

      <div class="">
        <label for="author">author</label>
        <input type="text" name="author" placeholder="author" id="author" value="{{ $book->author }}">
      </div>

      <div class="">
        <label for="genre">genre</label>
        <input type="text" name="genre" placeholder="genre" id="genre" value="{{ $book->genre }}">
      </div>

      <div class="">
        <label for="edition">edition</label>
        <input type="text" name="edition" placeholder="edition" id="edition" value="{{ $book->edition }}">
      </div>

      <div class="">
        <label for="description">description</label>
        <input type="text" name="description" placeholder="description" id="description" value="{{ $book->description }}">
      </div>

      <div class="">
        <label for="pages">pages</label>
        <input type="text" name="pages" placeholder="pages" id="pages" value="{{ $book->pages }}">
      </div>

      <div class="">
        <label for="year">year</label>
        <input type="text" name="year" placeholder="year" id="year" value="{{ $book->year }}">
      </div>

      <div class="">
        <label for="image">image URL</label>
        <input type="text" name="image" placeholder="image URL" id="image" value="{{ $book->image }}">
      </div>

      <div class="">
        {{-- qui ci sara un tasto che fara una richiesta PUT|PATCH a books.update che
        come metodo ha il metodo update e prende 2 parametri
        1: la richiesta (request) in update che contiene tutti i dati del form
        2: l oggetto ($id) su cui andare a fare l aggiornamento
        quindi prendiamo tutti i dati--}}
        <input type="submit" name="" value="Salva">
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    </form>
  </body>
</html>
