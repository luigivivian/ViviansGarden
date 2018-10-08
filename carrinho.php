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

    <title>Meu Carrinho</title>
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

?>

<div class="container-fluid">

    <div>
        <a class="btn btn-success btn-block mb-2 mt-xl-3" href="index.php">
            <i class="fa fa-plus"></i> Continuar comprando
        </a>
    </div>

    <?php if(count($_SESSION['carrinho']) != 0){?>

        <div class="tabela">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID ITEM</th>
                    <th scope="col">NOME</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">VALOR</th>
                    <th scope="col" class="text-center">OPÇÕES</th>
                </tr>
                </thead>
                <tbody id="tabela">
                <?php $total = 0;?>
                    <?php foreach($_SESSION['carrinho'] as $i){?>
                        <?php
                            $p = new Planta();
                            $dados = $p->getDados($i['idItem']);
                        ?>
                        <tr>
                            <td><?= $i['idItem'];?></td>
                            <td><?= $dados[0]['nomePopular'];?></td>
                            <td><?= $i['qtd'];?></td>
                            <td><?= $dados[0]['preco'] * $i['qtd'];?></td>
                            <?php $total += ($dados[0]['preco'] * $i['qtd']);?>
                            <td class="text-center"><a onclick=" return confirm(\'Deseja realmente deletar?\')" href="carrinho.php?op=delete&id=<?= $i['idItem'];?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="mt-xl-5">
            <h3>Total Pedido: <?= $total?></h3>
        </div>
        <div class="mt-xl-2">
            <a href="finalizarpedido.php" class="btn btn-success">Finalizar Pedido</a>
        </div>
    <?php }else{?>
        <div class="container-fluid mt-xl-5" style="height: 25rem;">
            <h1 class="text-center"> OPS ! Seu carrinho está vazio ! :(</h1>
        </div>
    <?php }?>
</div>

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