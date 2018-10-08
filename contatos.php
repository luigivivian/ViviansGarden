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

    <title>Aprovar pedidos</title>
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
    .tabela{
        border-left: #DDE0E6 solid 1px;
        border-right: #DDE0E6 solid 1px;
        border-bottom: #DDE0E6 solid 1px;
    }



</style>
<body>
<?php
include_once 'autentica.php';
include_once 'componentes/menu.php';
include_once 'Classes/Planta.php';
include_once 'Classes/Pedido.php';
include_once 'Classes/Usuario.php';

?>

<?php
$u = new Usuario();

$dados = $u->getContatos();
?>

<div class="container-fluid mt-xl-4 mb-xl-5">

    <?php if(count($dados) != 0){?>
        <div class="tabela">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" >ID CONTATO</th>
                    <th scope="col" class="text-center">USUARIO</th>
                    <th scope="col" class="text-center">VER</th>

                </tr>
                </thead>
                <tbody id="tabela">

                <?php foreach($dados as $key => $i){ ?>
                    <tr>
                        <td><?= $i['id'];?></td>
                        <td class="text-center"><?= $i['nome'];?></td>
                            <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPedido<?= $i['id'];?>"><i class="fa fa-search-plus"></i></button></td>

                            <div class="modal fade" id="modalPedido<?= $i['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modalPedido<?= $i['id'];?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Mensagem de: <?= $i['nome'] .' '. $i['sobrenome'];?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <hr>
                                            <div>
                                                <h5><b>Conteudo mensagem !</b></h5>
                                                <p><?= $i['msg']?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

    <?php }else{?>
        <div class="container mt-xl-4" style="height:30rem;">
            <h1 class="text-center"> OPS ! Nenhum pedido disponivel ! :(</h1>
        </div>
    <?php }?>
</div>

<!--Enviar comprovante-->
<?php include_once 'componentes/footer.php';?>




<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="assets/js/jquery-filestyle.min.js"></script>

<script>


</script>
</body>
</html>