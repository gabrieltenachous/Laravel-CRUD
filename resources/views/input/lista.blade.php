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

            <a href="/inputs/create">
                <input id="" class="btn btn-primary" type="button" value="Criar Entrada"></a>
            <table class="table">
                <thead>
                    <tr> 
                    <th scope="col">Produto</th>
                        <th scope="col">Tipo:</th>
                        <th scope="col">Data:</th>
                        <th scope="col">Quantidade:</th>
                        <th scope="col">Quantidade Antes:</th>
                        <th scope="col">Quantidade Depois:</th>
                        <th scope="col">Valor Unitario:</th>
                        <th scope="col">Valor Total:</th>
                        <th></th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody id="idTbody">

                </tbody>

            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja Excluir esse produto?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="idModal">Voce quer exluir esse produto?</p>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                        <button type="button" class="btn btn-primary" onclick="excluirId()">Excluir</button>

                    </div>
                </div>
            </div>

            <input type="hidden" id="url_id">


        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
@endsection

<script>
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

    function hidenId(valorUrl) {
        $('#url_id').val(valorUrl);
        console.log($('#url_id').val());
    }

    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/api/inputs',
        dataType: 'json',
        success: function(data) {
            data.map(u => {
                table = u.name;
                $('#product_id').append(table)
            })

        },
        error: function() {
            alert("Erro ao realizar  requisicao");
        }
    });

    function excluirId() {
        var valorUrl = $('#url_id').val();
        console.log(valorUrl)
        $.ajax({
            type: "DELETE",
            url: 'http://127.0.0.1:8000/api/inputs/' + valorUrl,
            dataType: 'json',
            success: function(data) {
                alert("Exclusão Correta");
                location.reload();
            },
            error: function() {
                alert("Erro ao realizar  requisicao");
            }
        });
    }
    const formatter = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
        minimumFractionDigits: 2
    })
    entrada = [];
    saida = [];
    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/api/products/',
        dataType: 'json',
        success: function(data) {



            data.map(u => {
                u.inputs.map(inp => {
                    entrada.push(inp);
                })

                u.saleproducts.map(inp => {
                    saida.push(inp); 
                })


                var entradaSaida = entrada.concat(saida);

                function compare(a, b) {
                    return a.created_at < b.created_at ? -1 : a.created_at > b.created_at ? 1 : 0;
                }
                entradaSaida.sort(compare);


                entradaSaida.map(inp => {
                    console.log(inp)
                    $table = "<tr>"; 
                    $table +="<td>"+inp.product.name+"</td>";
                    $table += "<td " + (inp.date != null ? ">Entrada" : ">Saída") + "</td>";
                    $table += "<td>" + (inp.date != null ? inp.date : inp.sale.date) + "</td>";
                    $table += "<td>" + inp.amount + "</td>";
                    $table += "<td>" + inp.before_amount + "</td>";
                    $table += "<td>" + inp.after_amount + "</td>";
                    $table += "<td>" + formatter.format(inp.unitary_value) + "</td>";
                    $table += "<td>" + formatter.format(inp.total_value) + "</td></tr>";
                    $('#idTbody').append($table);
                })


            })
        },
        error: function() {
            alert("Erro ao realizar  requisicao");
        }
    });
</script>

</html>