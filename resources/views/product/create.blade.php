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

    <form action="" method="POST">
        @csrf
        <label for="">Nome:</label>
        <input type="text" name="name" id="name"><br> 
        <label for="">Codigo:</label>
        <input type="text" name="unitary_value" id="code"><br>
         
        <input type="button" value="Salvar" onclick="cadastraProduto() "/>
        <a href="/produtos/lista/">Voltar</a>
    </form>
 
    <script>
        function cadastraProduto() {
            var name = $("#name").val()
            var amount = 0;
            var code = $("#code").val()
            $.ajax({
                type: "POST",
                url: 'http://127.0.0.1:8000/api/products/',
                dataType: 'json',
                data: {
                    'name': name,
                    'amount': 0,
                    'code': code,
                },
                success: function(data) { 
                    console.log(data)
                    alert("Cadastro por sucesso");
                },
                error: function() {
                    alert("Erro ao realizar  requisicao");
                }
            });
        }
    </script>


</body>

</html>