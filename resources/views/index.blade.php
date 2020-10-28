<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  {{-- dopo aver visto la ROUTE INDEX andiamo a stampare gli elementi
  come sotto prima la parte della tabella co i titoli e poi la parte
  con gli elementi in questo caso i libri --}}
  <body>
  <table>
    <thead>
      <tr>
        <th>isbn</th>
        <th>title</th>
        <th>author</th>
        <th>genre</th>
        <th>edition</th>
        <th>description</th>
        <th>pages</th>
        <th>image</th>
        <th>year</th>
      </tr>

    </thead>
    @foreach ($books as $book)
      <tbody>
        <tr>
          <td>{{$book->isbn}}</td>
          <td>{{$book->title}}</td>
          <td>{{$book->author}}</td>
          <td>{{$book->genre}}</td>
          <td>{{$book->edition}}</td>
          <td>{{$book->description}}</td>
          <td>{{$book->pages}}</td>
          <td><img src="{{$book->image}}" alt=""></td>
          <td>{{$book->year}}</td>
        </tr>

      </tbody>
    @endforeach

  </table>



  </body>
</html>
