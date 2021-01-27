<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    @extends('master')
    @section("content")
    <div class="container">
        <div class="row">

            <a href="/users/create">
                <input id="" class="btn btn-primary" type="button" value="Criar Usuario"></a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Usuario:</th>
                        <th scope="col">Email:</th>
                        <th scope="col">Vendas:</th>
                        <th></th>
                        <th scope="col">Função</th>
                    </tr>
                </thead>
                <tbody id="idTbody">

                </tbody>


            </table>
        </div>




        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

@endsection
<script>
    function hidenId(valorUrl) {
        $('#url_id').val(valorUrl);
        console.log($('#url_id').val());
    }
 
    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/api/venda/',
        dataType: 'json',
        success: function(data) {
            data.map(u => {
                $table = "<tr>";
                $table += "<td> " + u.user.name + "</td>";
                $table += "<td> " + u.user.email + "</td>";
                $table += "<td>";
                u.saleprodutcts.map(x => {
                    $table += "<p> Produto: " + x.product.name + "</p>";
                    $table += "<p> Quantidade: " + x.amount + "</p>";
                    $table += "<p> Valor Total: " + x.total_value + "<p>";
                    $table += "<hr>";
                });

                $table += "</td>";
                $table += "</tr>";
                $('#idTbody').append($table)
            })

        },
        error: function() {

            alert("Erro ao realizar  requisicao");
        }
    });
</script>

</html>