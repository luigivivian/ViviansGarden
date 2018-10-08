<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
    <title>Deixe um recado</title>
</head>
<style>


</style>
<body>
<?php include_once 'componentes/menu.php';?>
<div class="container-fluid mt-xl-4" id="form" style="height: 40rem;">

    <?php if(isset($_GET['erro'])) { ?>
        <div class="alert alert-danger text-center" role="alert">
            <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['erro']);?></b>
        </div>
    <?php } ?>
    <div class="container col" id="boxForm">

        <div class="row">
            <div class="col"></div>
            <div class="col-md-6">
                <?php if(isset($_GET['sucesso'])){?>
                    <div class="alert alert-success text-center" role="alert">
                        <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['sucesso']);?></b>
                    </div>
                <?php }?>

            </div>
            <div class="col"></div>
        </div>
        <form action="gravarContato.php" method="post" id="formulario1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                </div>

                <div class="form-group col-md-6">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" placeholder="Digite seu sobrenome">
                </div>
            </div>
            <!--  Nome e sobrenome-->

            <div class="form-group">
                <label for="inputAddress">Email</label>
                <input type="text" class="form-control" name="email" placeholder="exemplo@gmail.com">
            </div>

            <div class="form-group">
                <label for="inputAddress2">Telefone</label>
                <input type="number" class="form-control" name="telefone" placeholder="54 3444-0505">
            </div>

            <div class="form-group">
                <label for="inputAddress2">Escreva sua mensagem</label>
                <textarea style="resize: none" id="msg" name="msg" rows="4" class="form-control" placeholder="Deixe seu recado!"></textarea>
        </form>
    </div>
    <div class="container-fluid col-md-2 col-md-offset-1">
        <button type="button submit" value="Submit" form="formulario1" class="btn btn-primary btn-lg btn-block" id="btnEnviar">Enviar</button>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>