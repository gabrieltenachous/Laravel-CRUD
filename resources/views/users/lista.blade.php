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
    <div class="container">
        <div class="row">

            <a href="/users/create">
                <input id="" class="btn btn-primary" type="button" value="Criar Usuario"></a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Name:</th>
                        <th scope="col">Email:</th>
                        <th scope="col">Funcção</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>

                        <th>{{$user -> id}}</th>
                        <td>{{$user -> name}}<br></td>
                        <td>{{$user -> email}}<br></td>
                        <td>
                            <a href="/users/ver/{{$user -> id}}">
                                <input name="" id="" class="btn btn-primary" type="button" value="Visualizar">
                            </a>
                            <a href="/users/editar/{{$user -> id}}">
                                <input name="" id="" class="btn btn-warning" type="button" value="Editar"></a>
                            <a href="/users/excluir/{{$user -> id}}">
                                <input name="" id="" class="btn btn-danger" type="button" value="Excluir"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>