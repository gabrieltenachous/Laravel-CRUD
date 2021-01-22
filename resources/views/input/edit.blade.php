<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nova entrada</title>
</head>

<body>
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-12 form-group">

                <label for="name">Produto</label>
                <select name="products" class="form-control" id="product_id">
                </select>
            </div>
            <div class="col-12  form-group">
                <label for="">Data:</label>
                <input type="text" class="form-control" name="email" id="date" value="{{$user->date}}"><br>
            </div>
            <div class="col-12  form-group">
                <label for="">Valor Unitario:</label>
                <input class="form-control"  type="text" id="unitary_value" value="{{$user->unitary_value}}"><br>
            </div>
            <div class="col-12  form-group">
                <input type="submit" class="btn btn-success" onclick="editarId()"></input>
                <input type="hidden" id="id-hidden" value="{{$user->id}}">
                <a href="/inputs/lista/"><button class="btn">Voltar</button> </a>
            </div>

        </div>
    </div>


</body>
<script>
    carregarProdutos();
    $(document).ready(function() {
        $("#unitary_value").maskMoney({
            prefix: "R$ ",
            decimal: ",",
            thousands: "."
        });
    });

    function carregarProdutos() {
        $.ajax({
            type: "GET",
            url: 'http://127.0.0.1:8000/api/products',
            dataType: 'json',
            success: function(data) {
                data.map(u => {
                    var table = "<option value='" + u.id + "'>" + u.name + "</option>"
                    $('#product_id').append(table);
                })
            },
            error: function() {
                alert("Erro ao realizar a requisicao")
            }
        });
    }

    function editarId() {
        var id = $("#id-hidden").val()
        var product_id = $("#product_id option:selected").val()
        var date = $("#date").val()
        var unitary_value = $("#unitary_value").maskMoney('unmasked')[0];
        $.ajax({
            type: "PUT",
            url: 'http://127.0.0.1:8000/api/inputs/' + id,
            dataType: 'json',
            data: {
                'product_id': product_id,
                'date': date,
                'unitary_value': unitary_value,
            },
            success: function(data) {
                console.log(product_id)
                console.log(unitary_value)
                console.log(date)
                alert("Usuário editado com sucesso")
            },
            error: function() {
                alert("Erro ao realizar  requisicao")
            }
        });
    }
</script>

</html>