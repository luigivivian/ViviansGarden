<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="assets/css/jquery-filestyle.css">

    <title>Adicionar plantas</title>
</head>
<style>
    .card{
        height: 50px;
    }
    .card-img-top{
        height: 300px;
    }
    .card-body{
        height: 300px !important;
    }



</style>
<body>
<?php
include_once 'autentica.php';
include_once 'componentes/menu.php';
include_once 'Classes/Planta.php';

?>
<!--VERIFICAR SE O USUARIO TEM PERMISSION(administrador) PARA ACESSAR ESSA AREA-->
<?php

//deletando planta
$p = new Planta();
if(isset($_GET['op']) && $_GET['op'] == 'delete' && isset($_GET['id'])){

    if($p->deletar($_GET['id'])){
        unset($_GET['op']);
        unset($_GET['id']);
        echo "<a href=\"javascript:history.go(-1)\"></a>";
    }
}
?>

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Ádicione novas plantas ao site.</h1>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-success btn-block mb-2 mt-2" data-toggle="modal" data-target="#cadPlanta">
            <i class="fa fa-plus"></i> Adicionar item
        </button>
    </div>
    <div class="tabela">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">ALTURA MÁXIMA</th>
                    <th scope="col">ESTOQUE</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody id="tabela">

            </tbody>

        </table>
    </div>

</div>

<div class="modal fade" id="cadPlanta" tabindex="-1" role="dialog" aria-labelledby="cadPlanta" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadPlantaLabel">Cadastrar nova planta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if(isset($_GET['erro'])){?>
                    <div id="erro">
                        <div class="alert alert-danger text-center" role="alert">
                            <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['erro']);?></b>
                        </div>
                    </div>
                <?php }?>
                <form id="planta" enctype="multipart/form-data" method="POST" action="insertPlantas.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" id="id" disabled class="form-control" aria-describedby="emailHelp" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome Popular</label>
                        <input type="text" name="nomePopular" class="form-control" id="nomeP" aria-describedby="emailHelp" placeholder="Digite o nome da planta">
                        <small id="nomePHelp" class="form-text text-muted">campo obrigatório</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome Cientifico</label>
                        <input type="text" name="nomeCientifico" class="form-control" id="nomeC" aria-describedby="emailHelp" placeholder="Digite o nome cientifico da planta">
                        <small id="nomeCHelp" class="form-text text-muted">campo obrigatório</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Altura Máxima (Metros)</label>
                        <input type="number" name="alturaMax" step="0.1" class="form-control" id="alturaMax" aria-describedby="emailHelp" placeholder="Altura máxima">
                        <small id="alturaHelp" class="form-text text-muted">campo obrigatório</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantidade em estoque</label>
                        <input type="number" name="estoque" step="0.1" class="form-control" id="estoque" aria-describedby="estoque" placeholder="Quantidade disponivel em estoque">
                        <small id="estoqueHelp" class="form-text text-muted">campo obrigatório</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Preço</label>
                        <input type="number" name="preco" step="0.1" class="form-control" id="preco" aria-describedby="preco" placeholder="Preço da planta">
                        <small id="precoHelp" class="form-text text-muted">campo obrigatório</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição </label>
                        <textarea name="descricao" class="form-control" id="descricao" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Cuidados</label>
                        <textarea name="cuidados" class="form-control" id="cuidados" rows="3"></textarea>
                    </div>

                    <div id="inputImg">
                        <h5 class="text-dark">Selecione um icone</h5>
                        <input id="imgs" required type="file" name="icone[]"/><br><br>
                    </div>

                     <div id="inputImg">
                        <h5 class="text-dark">Selecione as imagens da planta</h5>
                        <input id="imgs" required type="file" name="arquivo[]" multiple="multiple" /><br><br>
                     </div>

                    <div class="modal-footer">
                        <button type="submit" id="salvar" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="assets/js/jquery-filestyle.min.js"></script>

<script>
    $(document).ready(function() {
        /// Quando usuário clicar em salvar será feito todos os passo abaixo



        getPlantas();
        function getPlantas() {
            $('#tabela').empty(); //Limpando a tabela
            $.ajax({
                type:'post',
                dataType: 'json',	//Definimos o tipo de retorno
                url: 'getPlantas.php',
                success: function(dados){
                    for(var i=0;dados.length>i;i++){
                        //Adicionando registros retornados na tabela
                        $('#tabela').append(
                            '<tr>' +
                                '<td>'+dados[i].id+'</td>' +
                                 '<td>'+dados[i].nomePopular+'</td>' +
                                '<td>'+dados[i].alturaMax+'</td>' +
                                '<td>'+dados[i].estoque+'</td>' +
                                '<td><a href="editar.php?op=editar&id='+dados[i].id+'" class="btn btn-info"><i class="fa fa-edit"></i></a><a onclick=" return confirm(\'Deseja realmente deletar?\')" href="adicionarPlanta.php?op=delete&id='+dados[i].id+'" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>' +
                            '</tr>'
                        );
                    }
                }
            });
        }

    });


</script>
<?php if(isset($_GET['erro'])){?>
    <script>
        $(document).ready(function (){
            $('#cadPlanta').modal('show');

        });
    </script>
<?php }?>
</body>
</html>