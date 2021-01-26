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
      <div class="form-group">
        <label for="name">Produto</label>
        <select name="products"  class="form-control" id="products_id">
        </select>
      </div> 
      <div class="form-group">
        <label for="preco">Valor unitário</label>
        <input required type="number" name="preco" type="text" value="13" class="form-control" id="unitary-value" placeholder="Valor unitário">
      </div>
      <div class="form-group">
        <label for="preco">Quantidade</label>

        <input requerd type="number" ng-model="vm.numero1" name="amount" value="12" class="form-control" id="amount" placeholder="Quantidade">
      </div>
      <div class="form-group">
        <label for="preco">Valor Total</label>
        <input disabled class="form-control" ng-model="vm.numero2" name="total_number" id="total_amount" value="13">
      </div>

      <input type="button" ng-if="vm.numero1 !== undefined && vm.numero2 !== undefined" id="add" class="btn btn-success" onclick="adicionarProduto()" value="Adicionar" />

      <input type="button" class="btn btn-primary" value="Comprar" onclick="cadastraVendas()" />
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

    $(document).ready(function() {
      $("#add").click(function() {

        var products_id = $("#products_id option:selected").val()

        var a = $('input[name="products"]').val(); 
        var c = $('input[name="preco"]').val();
        var d = $('input[name="amount"]').val();
        var e = $('input[name="total_number"]').val();
        $("tbody").append("<tr>");
        $("tbody").append("<td>" + products_id + "</td>");
        $("tbody").append("<td>" + c + "</td>");
        $("tbody").append("<td>" + d + "</td>");
        $("tbody").append("<td>" + e + "</td>");
        $("tbody").append("</tr>");
      });
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

    function cadastraVendas() {
        
        var amount = $('#amount').val()
        
        var products_id = $("#products_id option:selected").val()
        var unitary_value = $('#unitary-value').maskMoney('unmasked')[0];
        var date = $("#date").val()
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
                'date': date,
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>

</html>