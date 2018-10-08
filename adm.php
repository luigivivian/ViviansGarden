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

<title>Administração</title>
<style>
    .menuzinho{
        border-style: solid;
        border-width: 0px;
        border-radius: 15px;
        height: auto;
        -webkit-box-shadow: 0px 0px 38px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 38px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 38px -4px rgba(0,0,0,0.75);
    }
    .card:hover{
        border: 1px solid #0f0f0f !important;
    }
    .card{
        border: 1px solid transparent !important;
    }
    body{
        background-color: #E8EBEF;
    }


</style>
</head>
<body>
<?php
include_once 'autentica.php';
include_once 'componentes/menu.php'
?>
<!--VERIFICAR SE O USUARIO TEM PERMISSION(administrador) PARA ACESSAR ESSA AREA-->

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Área administrativa</h1>
            <p class="lead">Opções administrativas disponíveis através menu abaixo !</p>
        </div>
    </div>

<div class="row ">
<!--    coluna fantasma-->
    <div class="col-md"></div>
<!--    box menu AND coluna do meio-->
    <div class="col-md-10 menuzinho mb-xl-5 mt-xl-5">
<!--        titulo kmenu-->
        <div class="text-center text-dark mt-xl-5"><h3>OPÇÕES DISPONÍVEIS</h3></div>
        <hr>
<!--        deck dos cards-->
        <div class="card-deck mb-5 mt-5 pl-lg-2 pr-lg-2">
<!--            card1-->
            <div class="card text-white bg-success mb-3" onclick="location.href='adicionarPlanta.php';" style="max-width: 18rem;">
                <div class="card-header text-center">MANUTENÇÃO PLANTAS</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa fa-caret-right"></i> Clique para acessar <i class="fa fa-caret-left"></i></h5>
                    <p class="card-text text-center">Entre aqui para gerencias as plantas do site.</p>
                </div>
            </div>

            <div class="card text-white bg-success mb-3" onclick="location.href='aprovarPedidos.php';" style="max-width: 18rem;">
                <div class="card-header text-center">GERENCIAR PEDIDOS</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa fa-caret-right"></i> Clique para acessar <i class="fa fa-caret-left"></i></h5>
                    <p class="card-text text-center">Entre aqui para gerenciar os pedidos</p>
                </div>
            </div>

            <div class="card text-white bg-success mb-3" onclick="location.href='contatos.php';" style="max-width: 18rem;">
                <div class="card-header text-center">GERENCIAR CONTATOS</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa fa-caret-right"></i> Clique para acessar <i class="fa fa-caret-left"></i></h5>
                    <p class="card-text text-center">Entre aqui para ver as mensagens de usuarios</p>
                </div>
            </div>

        </div>
        <hr>
    </div>

    <div class="col-md"></div>
</div>


</div>

<?php include_once 'componentes/footer.php';?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>