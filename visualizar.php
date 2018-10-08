<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/stylera.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <title>Vivian's gardem</title>
</head>
<body>
<style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-image: none;
    }
    .carousel-control-next-icon:after {
        content: '>';
        font-size: 55px;
        color: #467505;
    }
    .carousel-control-prev-icon:after {
        content: '<';
        font-size: 55px;
        color: #467505;
    }
</style>
<?php
include_once 'componentes/menu.php';
include_once 'Classes/Planta.php';
$p = new Planta();
if(isset($_GET['id'])){
    $dados = $p->getAll($_GET['id']);
    $imgs = $p->getAll($_GET['id']);
    if(count($dados) == 0){
        $dados = $p->getDados($_GET['id']);
    }
}
?>
<div class="container-fluid mt-xl-2">
    <div class="row">
        <?php if(count($imgs) > 0){?>
        <div class="col-md-6">
            <div id="slides" class="carousel slide container-fluid" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $cont = 0;?>
                    <?php foreach($dados as $v){ ;?>
                        <li data-target="#slides" data-slide-to="<?= $cont;?>" class="<?= $cont == 0 ? 'active' : '';?>"></li>
                        <?php $cont++; }?>
                </ol>
                <div class="carousel-inner">
                    <?php $cont = 0;?>
                    <?php foreach($dados as $v){ ;?>
                        <div class="carousel-item <?= $cont == 0 ? 'active' : '';?>">
                            <img class="d-block w-100" src="imagens/<?= $v['nome'];?>" alt="teste" style=" height: 30em; ">
                        </div>
                        <?php $cont++; }?>
                </div>
                <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">anterior</span>
                </a>
                <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                    <span class="carousel-control-next-icon text-dark" aria-hidden="false"></span>
                    <span class="sr-only">proximo</span>
                </a>
            </div>
        </div>
        <?php }else{?>
            <div class="col-md-6 text-center mt-xl-5">
                <h3>Imagens não disponiveis !</h3>
            </div>
        <?php }?>
        <div class="col">
            <div class="" style="height: 30em;">
                <div class="container-fluid">
                    <h1 class="display-4"><?= $dados[0]['nomePopular'];?></h1>
                    <hr>
                    <h3 >Nome Cientifico: <?= $dados[0]['nomeCientifico'];?></h3>
                    <p class="lead">Altura máxima: <?= $dados[0]['alturaMax'];?></p>
                    <p class="lead"><b>Descrição: </b><?= $dados[0]['descricao'];?></p>
                    <p class="lead"><b>Cuidados: </b><?= $dados[0]['cuidados'];?></p>
                    <p class="lead">Preço: <span class="text-success">R$ <?= $dados[0]['preco'];?></span></p>
                    <form class="mt-xl-5" method="POST" action="addItem.php?add=<?=$_GET['id'];?>&preco=<?= $dados[0]['preco'];?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <?php if($dados[0]['estoque'] == 0){?>
                                    <input type="number" value="SEM ESTOQUE" name="qtd" disabled class="form-control" id="qtd" required placeholder="Selecione a quantia">

                                <?php }else{?>
                                <?php
                                    $estoque = 0;
                                    foreach($_SESSION['carrinho'] as $v){
                                        if($v['idItem'] == $_GET['id']){
                                            $estoque += $v['qtd'];
                                        }
                                    }
                                    ?>
                                    <?php if(($dados[0]['estoque'] - $estoque) == 0){?>
                                        <input type="number" value="SEM ESTOQUE" name="qtd" disabled max="<?= $dados[0]['estoque'];?>" class="form-control" id="qtd" required placeholder="SEM ESTOQUE">
                                    <?php }else{?>
                                        <input type="number" value="1" name="qtd" min="1" max="<?= $dados[0]['estoque'] - $estoque;?>" class="form-control" id="qtd" required placeholder="Selecione a quantia">

                                    <?php }?>
                                <?php }?>
                            </div>
                            <?php if(isset($_SESSION['login'])){?>
                                <?php if(($dados[0]['estoque'] - $estoque) == 0){?>
                                    <div class="col"><button disabled class="btn btn-success" type="submit">Comprar</button></div>
                                <?php }else{?>
                                    <div class="col"><button class="btn btn-success" type="submit">Comprar</button></div>
                                <?php }?>
                            <?php }else{?>
                            <div class="col"><a class="btn btn-success" href="login.php">Comprar</a></div>
                            <?php }?>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include_once 'componentes/footer.php';?>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>