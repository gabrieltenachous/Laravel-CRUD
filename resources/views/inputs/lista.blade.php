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
    <div class="container">
        <div class="row">

            <a href="/inputs/create">
                <input id="" class="btn btn-primary" type="button" value="Criar Usuario"></a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Produtos:</th>
                        <th scope="col">Antes:</th>
                        <th scope="col">Depois:</th>
                        <th scope="col">Valor Unitario:</th>
                        <th scope="col">Data:</th>
                        <th scope="col">Valor Total:</th>
                        <th></th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody id="idTbody">

                </tbody>

                    @foreach($inputs as $input)
                            <p>{{$input->product_id->name}</p>
                    @endforeach
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


<script>
    function hidenId(valorUrl) {
        $('#url_id').val(valorUrl);
        console.log($('#url_id').val());
    }
    
    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/api/users',
        dataType: 'json',
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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

    $.ajax({
        type: "GET",
        url: 'http://127.0.0.1:8000/api/inputs/',
        dataType: 'json',
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(data) {
            data.map(u => {
                modal = $('#url_id').val();
                table = "<tr>";
                table += "<td>" + u.id + "</td>";
                table += "<td id='product_id'>" + u.product_id + "</td>";
                table += "<td>" + u.after_amount + "</td>";
                table += "<td>" + u.before_amount + "</td>";
                table += "<td>" + u.unitary_value + "</td>";
                table += "<td>" + u.date + "</td>";
                table += "<td>" + u.total_value + "</td>";
                table += "<td>" + "<input class='btn btn-danger' type='button' data-toggle='modal' data-target='#exampleModal' onclick='hidenId(" + u.id + ")' value='Excluir'/>" + "</td>";
                table += "<td>" + "<a href='/inputs/editar/" + u.id + "'>" + "<input class='btn btn-warning' type='button' value='Editar'/>" + " </a>" + "</td> ";
                table += "<td>" + "<a href='/inputs/ver/" + u.id + "'>" + "<input class='btn btn-success' type='button' value='Visualizar'/>" + " </a>" + "</td>";
                table += "</tr>"
                $('#idTbody').append(table)
            })

        },
        error: function() {
            alert("Erro ao realizar  requisicao");
        }
    });
</script>

</html>