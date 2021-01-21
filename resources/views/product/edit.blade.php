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
    <label for="">Name:</label>
    <input type="text" name="name" id="name" value="{{$user->name}}"><br> 
    <label for="">Code:</label>
    <input name="code" id="code" type="text" value="{{$user->code}}"><br>
    <input type="submit" onclick="editarId()">Salvar</input>
    <input type="hidden" id="id-hidden" value="{{$user->id}}"> 
  <a href="/produtos/lista/">Voltar</a>


</body>
<script>
    function editarId() {
        var id = $("#id-hidden").val()
        var name = $("#name").val() 
        var code = $("#code").val()
        $.ajax({
            type: "PUT",
            url: 'http://127.0.0.1:8000/api/products/'+ id,
            dataType: 'json',
            data: {
                'name': name, 
                'code': code,
            }, 
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