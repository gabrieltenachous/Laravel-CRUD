<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head> 
  <body>
      
    <form action="{{ route('alterar_user',['id' => $user->id]) }}" method="POST">
        @csrf
        <label for="">Nome:</label> 
        <input type="text" name="name" value="{{$user->name}}"><br>
        <label for="">Email:</label>
        <input type="text" name="email" value="{{$user->email}}"><br>
        <label for="">Senha:</label> 
        <input type="text" name="password"><br>
        <input type="submit">Salvar</input>

    </form>

    <a href="/users/list/">Voltar</a>
    </body>
</html>