<!doctype html>
<html lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/stylera.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />

<title>Bem vindo !</title>
</head>
    <style>

        .card{
            height: 50px;
            border: transparent 0px hidden;
        }
        .carta{
            border: #0f0f0f 2px solid;
        }

        .card-img-top{
            height: 300px;
        }
        .card-body{
            height: 200px !important;
        }

        .card-img-top{
            border: rgb(175, 175, 175) 2px solid;
            border-bottom: transparent;
        }
        .card-body{
            border-right: rgb(175, 175, 175) 2px solid;
            border-left:rgb(175, 175, 175) 2px solid;
        }
        #conteudo{
            background-color: #E8EBEF;
        }

    </style>
<body>
<?php
    include_once 'componentes/menu.php';
    include_once 'Classes/Planta.php';
    $p = new Planta();
    $plantas = $p->getPlantas();

?>

<?php
session_start();
if(!isset ($_SESSION['login']) and !isset ($_SESSION['senha']))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $logado = false;
}else{
    $logado = true;
}
?>
<div id="conteudo">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Árvores disponiveis !</h1>
            <p class="lead">Consulte para saber mais informações sobre tamanho e preços !</p><a class="btn btn-success" href="deixarRecado.php">Consultar</a>
        </div>
    </div>
    <section>
        <div class="container">
            <?php
            $cont = 0;
            foreach($plantas as $v){
                if($cont == 0) { ?>
                    <div class="row card-columns mt-5">
                <?php } ?>
                <div class="col-sm-4">
                    <div class="card" onclick="location.href='visualizar.php?id=<?=$v['id'];?>'">
                        <?php $icon = $p->getIcone($v['id'])?>
                        <img class="card-img-top" src="imagens/<?= $icon[0]['nome']?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?= $v['nomePopular'];?></h4>
                            <p class="text-center">Altura máxima: <?= $v['alturaMax'];?></p>
                            <p class="text-center">Nome Cientifico:<?= $v['nomeCientifico'];?></p>
                            <p class="text-center">Descricao:<?= $v['descricao'];?></p>
                        </div>
                        <div class="card-footer text-center bg-success">
                            <small class="text-light ">&#187;Clique para saber mais !&#171;</small>
                        </div>
                    </div>
                </div>
                <?php
                if(++$cont == 3) {$cont = 0;?>
                    </div>
                <?php }?>
            <?php }?>

        </div>


    </section>
<?php include_once 'componentes/footer.php';?>
</div>




<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>