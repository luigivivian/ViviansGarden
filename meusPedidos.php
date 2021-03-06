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

    <title>Meus pedidos</title>
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
<!--VERIFICAR SE O USUARIO TEM PERMISSION(administrador) PARA ACESSAR ESSA AREA-->
<?php
$u = new Usuario();
$idUser = $u->getByLogin($_SESSION['login']);
$p = new Pedido();
$dados = $p->getPedidosByidUser($idUser[0]['id']);
//var_dump($dados);


?>

<div class="container mt-xl-4"">

    <?php if(count($dados) != 0){?>

        <div class="tabela">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" >ID PEDIDO</th>
                    <th scope="col" class="text-center">VALOR TOTAL</th>
                    <th scope="col" class="text-center">STATUS</th>
                    <th scope="col" class="text-center">ENVIAR COMPROVANTE</th>
                    <th scope="col" class="text-center">DATA</th>

                </tr>
                </thead>
                <tbody id="tabela">
                <?php $total = 0;?>
                <?php foreach($dados as $i){?>
                    <?php $comprovante = $p->getComprovanteByidPedido($i['id']);?>
                    <tr>
                        <td><?= $i['id'];?></td>
                        <td class="text-center"><?= $i['valorTotal'];?></td>
                        <?php if($i['status'] == "Aguardando comprovante."){?>
                            <td class="text-center text-primary"><?= $i['status'];?></td>
                            <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPedido<?= $i['id'];?>"><i class="fa fa-plus-circle"></i></button></td>

                            <div class="modal fade" id="modalPedido<?= $i['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modalPedido<?= $i['id'];?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Envie o comprovante de pagamento.</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5> Pedido ID: <?= $i['id'];?></h5>
                                            <hr>
                                            <h5>Atenção, o comprovante deverá ser scaneado ou fotografado com boa qualidade !</h5>
                                            <hr>
                                            <h5>O arquivo deverá ser em formato de imagem.</h5>
                                            <hr>

                                            <h5>Selecione a imagem do comprovante:</h5>
                                            <form method="POST" enctype="multipart/form-data" action="enviarComprovante.php">
                                                <input id="comprovante" required type="file" name="comprovante" /><br><br>
                                                <input type="hidden" name="idPedido" value="<?= $i['id'];?>">

                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Salvar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if($i['status'] == "Pedido aprovado."){?>
                            <td class="text-center text-success"><?= $i['status'];?></td>
                            <td class="text-center"><button class="btn btn-success" disabled><i class="fa fa-check"></i></button></td>
                        <?php }else if($i['status'] == "Pedido não aprovado."){?>
                            <td class="text-center text-danger"><?= $i['status'];?></td>
                            <td class="text-center"><button class="btn btn-danger" disabled><i class="fa fa-times-circle"></i></button></td>
                        <?php }else{?>
                            <td class="text-center text-warning"><?= $i['status'];?></td>
                            <td class="text-center"><button class="btn btn-primary" disabled><i class="fa fa-plus-circle"></i></button></td>

                        <?php }?>
                        <td class="text-center"><?= $i['data'];?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

    <?php }else{?>
        <div class="container mt-4" style="height: 25rem;">
            <h1 class="text-center"> OPS ! Você não possui nenhum pedido ! :(</h1>
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