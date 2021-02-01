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
            <a href="venda/create">
                <div class="col-10">
                    <input id="" class="btn btn-primary" type="button" value="Fazer Compra">
            </a>
        </div></a>

        <div class="form-group">
            <input type="date" class="form-control" id="data-inicial" />
            <input type="date" class="form-control" id="data-final" />
            <button id="search" class="btn btn-success" placeholder="Pesquisar" onclick="searchName()">Pesquisar</button>
        </div>
        <div id="divConteudo">

            <div id="tabela">

                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th><input type="text" id="name" placeholder="Produto" /></th>
                            <th>
                                <label for="filter">Tipo:</label>
                                <select onclick="tipoClick();" name="mylist" id="filter">
                                    <option value="Tudo">Tudo</option>
                                    <option value="Saída">Saída</option>
                                    <option value="Entrada">Entrada</option>
                                </select>
                            </th>

                            <p id="nameTd"></p>
                            <th>
                                <input type="text" id="txtColuna3" placeholder="Date">
                            </th>
                            <th><input type="text" id="txtColuna4" placeholder="Quantidade" /></th>
                            <th><input type="text" id="txtColuna5" placeholder="Quantidade A." /></th>
                            <th><input type="text" id="txtColuna6" placeholder="Quantidade D." /></th>
                            <th><input type="text" id="txtColuna7" placeholder="Valor Unitario" /></th>
                            <th><input type="text" id="txtColuna8" placeholder="Valor Total" /></th>
                        </tr>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Tipo:</th>
                            <th scope="col">Data:</th>
                            <th scope="col">Quantidade:</th>
                            <th scope="col">Quantidade Antes:</th>
                            <th scope="col">Quantidade Depois:</th>
                            <th scope="col">Valor Unitario:</th>
                            <th scope="col">Valor Total:</th>
                        </tr>
                    </thead>
                    <tbody id="idTbody">

                    </tbody>
                </table>
            </div>
        </div>

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
<style>
    body {
        font-family: Verdana;
    }

    #tabela {
        width: 100%;
        border: solid 1px;
        text-align: left;
        border-collapse: collapse;
    }

    #tabela tbody tr {
        border: solid 1px;
        height: 30px;
        cursor: pointer;
    }

    #tabela thead {
        background: beige;
    }

    #tabela thead th:nth-child(1) {
        width: 100px;
    }

    #tabela input {
        color: navy;
        width: 100%;
    }
</style>
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
    }
    //Pesquisa por Data
    function filtroData() {
        var inicial = $('#data-inicial').val()
        var final = $('#data-final').val()
        var pesquisa = $('#search').val()
        if (inicial == '' || final == '') {
            $("#tabela tbody tr").filter(function() {
                $(this).toggle(true)
            });
        } else {
            $("#tabela tbody tr").filter(function() {
                var data_linha = $(this).find('.data').text().toLowerCase();
                var nome_linha = $(this).find('.nome').text().toLowerCase();
                if (data_linha >= inicial && data_linha <= final) {
                    $(this).toggle(true)
                    if (pesquisa != '' && nome_linha != pesquisa) {
                        $(this).toggle(false)
                    }
                    if (pesquisa != '' && nome_linha == pesquisa) {
                        $(this).toggle(true)
                    } else if (pesquisa == '') {
                        $(this).toggle(true)
                    }
                } else {
                    $(this).toggle(false)
                }
            });
        }
    }


    // function filterTable() {
    //     let dropdown, filter;
    //     var input = $(this).find('.tipo').text().toLowerCase();
    //     dropdown = document.getElementById("countriesDropdown"); 
    //     filter = dropdown.value;
    //     console.log(filter) 
    //     if(filter == 'All'){
    //         $("#tabela tbody tr").filter(function() {
    //             $(this).toggle(true)
    //         });
    //     }else if(filter== "Saída"){
    //         $("#tabela tbody tr").filter(function() {
    //             $(this).toggle(false)
    //         });
    //     }else{
    //         $("#tabela tbody tr").filter(function() {
    //             $(this).toggle(false)
    //         });
    //     }
    // }    


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

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        return [year, month, day].join('-');
    }


    function searchName() {

        var name = $('#name').val();
        $.ajax({
            type: "GET",
            url: 'http://127.0.0.1:8000/api/venda',
            data: {
                "name": name,
            },
            dataType: 'json',
            success: function(data) {
                data.map(u => { 
                    u.saleproducts.map(inp =>{ 
                        $tabelas = u.name;
                        $('#nameTd').append($tabelas);
                    }) 
                })
            },
            error: function() {
                alert("Erro ao realizar  requisicao");
            }
        });
    }

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
            })
            var entradaSaida = entrada.concat(saida);

            function compare(a, b) {
                return a.created_at < b.created_at ? -1 : a.created_at > b.created_at ? 1 : 0;
            }
            entradaSaida.sort(compare);
            entradaSaida.map(inp => {
                $table = "<tr>";
                $table += "<td class='nome'>" + inp.product.name + "</td>";
                $table += "<td  class='tipo '" + (inp.date != null ? "><p class='btn btn-success'>Entrada</p> </td> " : "<td data-type='Saida' class='tipo'><p class='btn btn-danger'>Saída</p></td>");
                $table += "<td data-type='Entrada' class='data'>" + (inp.date != null ? inp.date : formatDate(inp.created_at)) + "</td>";
                $table += "<td>" + inp.amount + "</td>";
                $table += "<td>" + inp.before_amount + "</td>";
                $table += "<td>" + inp.after_amount + "</td>";
                $table += "<td>" + formatter.format(inp.unitary_value) + "</td>";
                $table += "<td>" + formatter.format(inp.total_value) + "</td>";
                $table += "</tr>";
                $('#idTbody').append($table);
            })
            data.map(u => {
                u.inputs.map(inp => {
                    if (u.amount == inp.product.amount) {
                        table = "<td>" + "<input class='btn btn-danger' type='button' data-toggle='modal' data-target='#exampleModal' onclick='hidenId(" + inp.product.id + ")' value='Excluir'/>" + "</td>";
                        table += "<td>" + "<a href='/inputs/editar/" + inp.product.id + "'>" + "<input class='btn btn-warning' type='button' value='Editar'/>" + " </a>" + "</td> ";
                        table += "<td>" + "<a href='/inputs/ver/" + inp.product.id + "'>" + "<input class='btn btn-success' type='button' value='Visualizar'/>" + " </a>" + "</td>";
                    } else {
                        table += "<td></td>"
                        table += "<td></td>"
                        table += "<td></td>"
                    }
                })
            })
            $table += "</tr>";
            $('#idTbody').append($table);
        },
        error: function() {
            alert("Erro ao realizar  requisicao");
        }
    });
</script>

</html>