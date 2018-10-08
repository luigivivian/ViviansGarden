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

    <title>Realizar pagamento</title>
</head>
<style>

    .marginTop{
        margin-top: 3% !important;
    }
    #boxLogin{
        border-style: solid;
        border-width: 0px;
        border-radius: 15px;
        height: auto;
        -webkit-box-shadow: 0px 0px 38px -4px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 38px -4px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 38px -4px rgba(0,0,0,0.75);
    }
    .input-group-text{
        width: 90px !important;
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

<div id="login" class="marginTop">
    <div class="row ">
        <div class="col-md"></div>
        <div class="col-md-5  p-lg-5" id="boxLogin">
            <div>
                <h3 class="text-center text-danger">Siga os passos descritos abaixo !</h3>
                <h4>1 - Efetue o pagamento com o valor do pedido nos seguintes bancos:</h4>
                <p>Banco do Brasil:<br>Conta: <b>007004685</b></p>
                <p>Banco Banrisul:<br>Conta: <b>978445554</b></p>
                <p>Banco do Santander:<br>Conta: <b>6481585</b></p>
                <h4>2 - Após efetuar o depósito envie uma <b>foto em boa qualidade</b> do comprovante para análise na área: "Minha conta, Meus Pedidos"</h4>
                <p>O depósito sera então validado pelos administradores, assim que o pedido for confirmado os produtos serão entregues conforme seus dados cadastrair !</p>
            </div>


            <div class="row mt-xl-2 mb-xl-2">
                <div class="col"></div>
                <div class="col-8">
                    <a href="meusPedidos.php" class="btn btn-primary btn-block mt-xl-4">
                        Meus Pedidos
                    </a>
                </div>
                <div class="col"></div>
            </div>

        </div>
        <div class="col-md"></div>
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


</script>
</body>
</html>