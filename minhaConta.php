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

    <title>Minha Conta</title>
</head>
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
<body>
<?php
include_once 'autentica.php';
include_once 'componentes/menu.php';
include_once 'Classes/Planta.php';
include_once 'Classes/Pedido.php';
include_once 'Classes/Usuario.php';

$u = new Usuario();


?>
<div style="height:30rem;">
    <div class="row ">
        <!--    coluna fantasma-->
        <div class="col"></div>
        <!--    box menu AND coluna do meio-->
        <div class="col-lg-6 menuzinho mb-xl-5 mt-xl-5">
            <!--        titulo kmenu-->
            <div class="text-center text-dark mt-xl-5"><h3>OPÇÕES DISPONÍVEIS</h3></div>
            <hr>
            <!--        deck dos cards-->
            <div class="card-deck mb-5 mt-5 pl-lg-2 pr-lg-2">
                <!--            card1-->
                <div class="card text-white bg-success mb-3" onclick="location.href='meusDados.php';" style="max-width: 18rem;">
                    <div class="card-header text-center">MEUS DADOS</div>
                </div>

                <div class="card text-white bg-success mb-3" onclick="location.href='meusPedidos.php';" style="max-width: 18rem;">
                    <div class="card-header text-center">MEUS PEDIDOS</div>
                </div>
                <div class="card text-white bg-success mb-3" onclick="location.href='alterarSenha.php';" style="max-width: 18rem;">
                    <div class="card-header text-center">ALTERAR SENHA</div>
                </div>
            </div>
            <hr>
        </div>

        <div class="col"></div>
    </div>
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