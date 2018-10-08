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
<!--VERIFICAR SE O USUARIO TEM PERMISSION(administrador) PARA ACESSAR ESSA AREA-->
<?php
$u = new Usuario();
$idUser = $u->getByLogin($_SESSION['login']);
$p = new Pedido();
$pl = new Planta();
$dados = $p->getPedidosAberto();
$op = $_GET;

if(isset($op)){
    $id = $_GET['id'];
    $url = 'aprovarPedidos.php';
    if($op['op'] == "aprovar"){
        $dados = array(
                'id' => $id
        );
        if($p->aprovarPedido($dados)){
            echo "<script type=\"text/javascript\">location.href = \"$url\";</script>";
        }
    }else if($op['op'] == "negar"){

        $itens = $p->getItens($id);

        foreach($itens as $v){
            $dados = array(
                'id' => $v['idPlanta'],
                'estoque' => $v['quantidade']
            );
            $pl->aumentarEstoque($dados);
        }
        $dados = array(
            'id' => $id
        );
        if($p->negarPedido($dados)){
            echo "<script type=\"text/javascript\">location.href = \"$url\";</script>";
        }
    }
}
$dados = $p->getPedidosAberto();
?>

<div class="container-fluid mt-xl-4 mb-xl-5">

    <?php if(count($dados) != 0){?>
        <div class="tabela">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" >ID PEDIDO</th>
                    <th scope="col" class="text-center">VALOR TOTAL</th>
                    <th scope="col" class="text-center">STATUS</th>
                    <th scope="col" class="text-center">VERIFICAR COMPROVANTE</th>
                    <th scope="col" class="text-center">OPÇÕES(APROVAR | NEGAR)</th>
                </tr>
                </thead>
                <tbody id="tabela">
                <?php $cont = 0;?>

                <?php foreach($dados as $key => $i){ ?>
                    <?php $comprovante = $p->getComprovanteByidPedido($i['id']);
                          $dadosPedido = $p->getDadosById($i['id']);

                    ?>
                    <tr>
                        <td><?= $i['id'];?></td>
                        <td class="text-center"><?= $i['valorTotal'];?></td>
                        <?php if($i['status'] == "Em análise."){?>
                            <td class="text-center text-primary"><?= $i['status'];?></td>
                            <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPedido<?= $i['id'];?>"><i class="fa fa-search-plus"></i></button></td>

                            <div class="modal fade" id="modalPedido<?= $i['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modalPedido<?= $i['id'];?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifique o comprovante de pagamento e confira a sua conta.</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5> Pedido ID: <?= $i['id'];?></h5>
                                            <h5>Valor total: <span class="text-success"><?= $i['valorTotal'];?></span></h5>
                                            <hr>
                                            <h5>Imagem do comprovante</h5>
                                            <hr>
                                            <div class="col"><img class="d-block w-100" src="imagens/<?= $comprovante[$cont]['nome'];?>" alt="teste" style=" height: 30em; "></div>
                                            <hr>
                                            <div>
                                                <h5><b>Dados para entrega:</b></h5>
                                                <hr>
                                                <p><b>Cidade: </b><?= $dadosPedido[$cont]['cidade'];?></p>
                                                <p><b>Cep: </b><?= $dadosPedido[$cont]['cep'];?></p>
                                                <p><b>Rua: </b><?= $dadosPedido[$cont]['rua'];?></p>
                                                <p><b>Bairro: </b><?= $dadosPedido[$cont]['bairro'];?></p>
                                                <p><b>Numero: </b><?= $dadosPedido[$cont]['numero'];?></p>
                                                <p><b>Complemento: </b><?= $dadosPedido[$cont]['complemento'];?></p>
                                                <p><b>Celular: </b><?= $dadosPedido[$cont]['celular'];?></p>
                                                <hr>
                                                <h5><b>Demanda:</b></h5>
                                                <?php  $itensPedido = $p->getItens($i['id']); ?>
                                                <?php foreach($itensPedido as $v){?>
                                                <p><b>Planta:</b> <?= $v['nomePopular'];?></p>
                                                <p><b>Quantidade:</b> <?= $v['quantidade'];?> planta(as)</p>
                                                <hr>
                                                <?php }?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $cont++;}?>
                        <td class="text-center"><a class="btn btn-success text-light" href="aprovarPedidos.php?op=aprovar&id=<?= $i['id'];?>" ><i class="fa fa-check"></i></a><a class="btn btn-danger text-light" href="aprovarPedidos.php?op=negar&id=<?= $i['id'];?>"><i class="fa fa-times-circle"></i></a></td>
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