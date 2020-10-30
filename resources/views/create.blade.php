{{-- 3° STEP!!! create deve mostrare un forum di inserimento
e facciamo riferimento al BookController --}}


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    {{-- nel nostro form andremo a mettere la rotta del nostro store in questo
    caso book.store per poi andare a fare il salvataggio effettivo, lo andiamo a richiamare
    con il metodo POST in tutte e due method--}}
    {{-- la create a sua volta spedisce i dati alla store --}}
    <form action="{{route('books.store')}}" method="POST">
      {{-- attenzione ad inserire questo token @csrf --}}
      @csrf
      @method('POST')

      <div class="">
        <label for="isbn">isbn</label>
        <input type="text" name="isbn" placeholder="isbn">
      </div>

      <div class="">
        <label for="title">title</label>
        <input type="text" name="title" placeholder="title">
      </div>

      <div class="">
        <label for="author">author</label>
        <input type="text" name="author" placeholder="author">
      </div>

      <div class="">
        <label for="genre">genre</label>
        <input type="text" name="genre" placeholder="genre">
      </div>

      <div class="">
        <label for="edition">edition</label>
        <input type="text" name="edition" placeholder="edition">
      </div>

      <div class="">
        <label for="description">description</label>
        <input type="text" name="description" placeholder="description">
      </div>

      <div class="">
        <label for="pages">pages</label>
        <input type="number" name="pages" placeholder="pages">
      </div>


      <div class="">
        <label for="image">image</label>
        <input type="text" name="image" placeholder="image">
      </div>


      <div class="">
        <label for="year">year</label>
        <input type="date" name="year" placeholder="year">
      </div>

      <div class="">
        <input type="submit" name="" value="invia">
      </div>


    </form>
  </body>
</html>
