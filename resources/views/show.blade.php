{{-- 2° STEP!!!  in show ci viene automaticamente iniettato l id del libro
e facciamo riferimento al BookController --}}

<ul>
  <li><img style="width: 200px" src="{{$book->image}}"></li>
  <li>{{$book->isbn}}</li>
  <li>{{$book->title}}</li>
  <li>{{$book->author}}</li>
  <li>{{$book->genre}}</li>
  <li>{{$book->edition}}</li>
  <li>{{$book->description}}</li>
  <li>{{$book->pages}}</li>
  <li>{{$book->year}}</li>

</ul>
{{-- creiamo un form per la cancellazione dell elemento --}}
{{-- books.destroy sarà il metodo che effettivamente effettuera la cancellazione --}}
<form action="{{route("books.destroy", $book->id)}}" method="POST">
  @method("DELETE")
  @csrf
  <input type="submit" value="Cancella">
</form>
