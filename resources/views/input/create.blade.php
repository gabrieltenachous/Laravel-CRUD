<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nova entrada</title>
</head>

<body>
    <div class="col-md-6 offset-md-3">
        <h1 class="text-center">Nova entrada</h1>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Produto</label>
                <select name="products" class="form-control" id="products_id">
                </select>
                <div class="form-group">
                    <label for="preco">Valor unitário</label>
                    <input required type="text" class="form-control" id="unitary-value" placeholder="Valor unitário">                </div>
                <div class="form-group">
                    <label for="preco">Quantidade</label>
                    <input requerd type="number" class="form-control" id="amount" placeholder="Quantidade">
                </div>

                <input type="button" class="btn btn-primary" onclick="cadastraEntrada()" value="Cadastrar" />
                <a href="/inputs/lista" class="btn btn-outline-primary">Voltar</a>
        </form>
    </div>

</body>


<script>
    carregarProdutos();

    $(document).ready(function() {
        $("#unitary-value").maskMoney({
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
                     $('#products_id').append(table);
                })
            },
            error: function() {
                alert("Erro ao realizar a requisicao")
            }
        });
    }

    function cadastraEntrada() {

        var amount = $('#amount').val() 
        var products_id = $("#products_id option:selected").val()
        var unitary_value = $('#unitary-value').maskMoney('unmasked')[0]; 
        var amount = $("#amount").val()
        var before_amount = $("#amount").val()
        var after_amount = $("#amount").val()
        $.ajax({
            type: "POST",
            url: 'http://127.0.0.1:8000/api/inputs',
            dataType: 'json',
            data: {
                'product_id': products_id,
                'unitary_value': unitary_value, 
                'before_amount': before_amount,
                'after_amount': after_amount,
                'amount': amount,
            },
            success: function(data) {
                console.log(amount)
                alert("Product successfully registered")
            },
            error: function(data) {
                alert("Erro ao realizar a requisicao")
            }
        });
    }
</script>

</html>