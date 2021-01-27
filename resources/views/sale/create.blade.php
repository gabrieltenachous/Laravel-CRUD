<!doctype html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nova entrada</title>
</head>

<body>


    @extends('master')
    @section("content")

    @csrf<div class="col-md-6 offset-md-3">
        <h1 class="text-center">Compra Produto</h1>
        <form action="" method="POST">
            @csrf

            <a href="/venda/lista">Ir para Lista</a>
            <div class="form-group">
                <label for="name">Produto</label>
                <select name="products" class="form-control" id="products_id">
                </select>
            </div>
            <div class="form-group">
                <label for="preco">Valor unitário</label>
                <div id="bodyId">
                    <input disabled required value='2' name='preco' type='text' value='13' class='form-control' id='unitary-value' placeholder='Valor unitário'>    
                </div>
            </div>
            <div class="form-group">
                <label for="preco">Quantidade</label>
                <input requerd min="0" type="number" ng-model="vm.numero1" name="amount" value="12" class="form-control" id="amount" placeholder="Quantidade">
            </div>
            <div class="form-group">
                <label for="preco">Valor Total</label>
                <input disabled class="form-control" ng-model="vm.numero2" name="total_number" id="total_amount" value="21">
            </div>

            <input type="button" ng-if="vm.numero1 !== undefined && vm.numero2 !== undefined" id="add" class="btn btn-success" value="Adicionar" />

            <input type="button" class="btn btn-primary" value="Comprar" onclick="comprarProdutos()" />
            <br> <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Valor Unitario</th>
                        <th>Quantidade</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </form>
    </div>
    @endsection
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
                    'password': password,
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

        function comprarProdutos() {

            var produtos_id_compra = [];
            var unitary_value_compra = [];
            var amount_compra = [];
            var total_value = [];

            $(".product_td").each(function() {
                    produtos_id_compra.push($(this).html())
                }),
                
                $(".value_td").each(function() {
                    unitary_value_compra.push($(this).html())
                }),
                $(".amount_td").each(function() {
                    amount_compra.push($(this).html())
                }),
                $(".total_number_td").each(function() {
                    total_value.push($(this).html())
                }),

                console.log(amount_compra)
            $.ajax({
                type: "POST",
                url: 'http://127.0.0.1:8000/api/venda',
                dataType: 'json',
                data: {

                    "product_id": produtos_id_compra,
                    "unitary_value": unitary_value_compra,
                    "total_value": total_value,
                    "amount": amount_compra,

                },
                success: function(data) {
                    alert("Product successfully registered")
                },
                error: function(data) {
                    alert("Erro ao realizar a requisicao")
                    console.log(data)
                }
            });
        }

        $(document).ready(function() {
            $("#add").click(function() {

                var products_id = $("#products_id option:selected").val()

                var a = $('input[name="products"]').val();
                var c = $('input[name="preco"]').val();
                var d = $('input[name="amount"]').val();
                var e = $('input[name="total_number"]').val();
                $("tbody").append("<tr id='reservations '>");
                $("tbody").append("<td class='product_td' id='product_td'>" + products_id + "</td>");
                $("tbody").append("<td class='value_td' id='value_td'>" + c + "</td>");
                $("tbody").append("<td class='amount_td' id='amount_td'>" + d + "</td>");
                $("tbody").append("<td class='total_number_td' id='total_number'>" + e + "</td>");
                $("tbody").append("</tr>");
            });
        });

        $.ajax({
            type: "GET",
            url: 'http://127.0.0.1:8000/api/inputs',
            dataType: 'json',
            success: function(data) {
                data.map(u => {

                    $('#bodyId').append(table);
                })
            },
            error: function() {
                alert("Erro ao realizar a requisicao")
            }
        });
        carregarProdutos();

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
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>