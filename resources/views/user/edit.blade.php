<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-12 form-group">
            
                <label for="">Nome:</label>
                <input type="text"class="form-control" name="name" id="name" value="{{$user->name}}"><br>
            </div>
            <div class="col-12  form-group">
                <label for="">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}"><br>
            </div>
            <div class="col-12  form-group">
                <label for="">Senha:</label>
                <input name="password" class="form-control" type="password" value="{{$user->password}}"><br>
            </div>
            <div class="col-12  form-group">
                <input type="submit" class="btn btn-success" onclick="editarId()"></input>
                <input type="hidden" id="id-hidden" value="{{$user->id}}">
                <a href="/users/list/"><button class="btn">Voltar</button> </a>
            </div>

        </div>
    </div>


</body>
<script>
    function editarId() {
        var id = $("#id-hidden").val()
        var name = $("#name").val()
        var email = $("#email").val()
        var password = $("#password").val()
        $.ajax({
            type: "PUT",
            url: 'http://127.0.0.1:8000/api/users/' + id,
            dataType: 'json',
            data: {
                'name': name,
                'email': email,
                'password': password,
            },
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data) {
                console.log(data)
                alert("Usuário editado com sucesso")
            },
            error: function() {
                alert("Erro ao realizar  requisicao")
            }
        });
    }
</script>

</html>