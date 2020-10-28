<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="{{route('books.store')}}" method="post">
      @csrf
      @method('POST')
      <label for="title">title</label>
      <input type="text" name="title" placeholder="title">
      <input type="submit" name="" value="invia">
    </form>
  </body>
</html>
