<!doctype html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <form action="{{route('registrar_produto') }}" method="POST">
        @csrf
        <label for="">Nome:</label>
        <input type="text" name="name" id="name"><br>
        <label for="">Email:</label>
        <input type="text" name="email" id="email"><br>
        <label for="">Senha:</label>
        <input type="text" name="password" id="password"><br>
        <input type="button" value="Salvar" onclick="cadastraUsuario()"/>
        <a href="/users/list/">Voltar</a>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        function cadastraUsuario() {
            var name = $("#name").val()
            var email = $("#email").val()
            var password = $("#password").val()
            $.ajax({
                type: "POST",
                url: 'http://127.0.0.1:8000/api/users/',
                dataType: 'json',
                data: {
                    'name': name,
                    'email': email,
                    'password':password,
                },
                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {
                    console.log(data)
                },
                error: function() {
                    alert("Erro ao realizr  requisicao")
                }
            });
        }
    </script>
    
    
</body>

</html>