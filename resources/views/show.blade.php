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

<form action="{{route("books.destroy", $book->id)}}" method="POST">
  @method("DELETE")
  @csrf
  <input type="submit" value="Cancella">
</form>
