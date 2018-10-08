<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <title>Efetuar login</title>
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
</head>
<body>
<?php
include_once 'componentes/menu.php'
?>


<div id="login" class="marginTop">
    <div class="row ">
        <div class="col-md"></div>
        <div class="col-md-5  p-lg-5" id="boxLogin">
            <?php if(isset($_GET['errologin'])) { ?>
                <div class="alert alert-danger text-center" role="alert">
                    <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['errologin']);?></b>
                </div>
            <?php } ?>
            <?php if(isset($_GET['sucesso'])) { ?>
                <div class="alert alert-success text-center" role="alert">
                    <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['sucesso']);?></b>
                </div>
            <?php } ?>
            <form method="post" action="logar.php">
                <div class="input-group mb-3 mt-xl-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"> LOGIN</i></span>
                    </div>
                    <input type="text" name="login" class="form-control" placeholder="Digite seu nome de suario..." aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"> SENHA</i></span>
                    </div>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua senha..." aria-describedby="basic-addon1">
                </div>
                <div class="row mt-xl-5">
                    <div class="col"></div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-success btn-block">Efetuar login</button>
                    </div>
                    <div class="col"></div>
                </div>
            </form>
            <div class="row mt-xl-2 mb-xl-2">
                <div class="col"></div>
                <div class="col-8">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalCadastro">
                        Novo usuario? Cadastre-se
                    </button>
                </div>
                <div class="col"></div>
            </div>

        </div>
        <div class="col-md"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroLabel">Preencha os campos para se cadastrar.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if(isset($_GET['erroCadastro'])){?>
                        <div id="erro">
                            <div class="alert alert-danger text-center" role="alert">
                                <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['erroCadastro']);?></b>
                            </div>
                        </div>
                    <?php }?>
                    <form id="cadastro"  method="POST" action="cadastrar.php">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Digite seu nome...">
                            <small id="nomeHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" name="sobrenome" class="form-control" id="sobrenome" aria-describedby="sobrenomeHelp" placeholder="Digite seu sobrenome...">
                            <small id="nomeHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>

                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Digite seu login...">
                            <small id="loginHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password"  name="senha" class="form-control" id="senha" aria-describedby="senhaHelp" placeholder="Digite sua senha">
                            <small id="nomeCHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Confirme sua senha</label>
                            <input type="password"  name="senha2" class="form-control" id="senha2" aria-describedby="senhaHelp" placeholder="Digite sua senha...">
                            <small id="nomeCHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>

                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" name="celular" class="form-control" id="celular" aria-describedby="loginHelp" placeholder="Digite seu celular para contato...">
                            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="celular">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu email...">
                            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="celular">Cidade</label>
                            <input type="text" name="cidade" class="form-control" id="cidade" aria-describedby="cidadeHelp" placeholder="Digite o nome da sua cidade...">
                            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="celular">Rua</label>
                            <input type="text" name="rua" class="form-control" id="rua" aria-describedby="ruaHelp" placeholder="Digite o nome da sua rua...">
                            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="celular">Número</label>
                            <input type="number" name="numero" class="form-control" id="numero" aria-describedby="numeroHelp" placeholder="Digite o número de sua casa...">
                            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" class="form-control" id="bairro" aria-describedby="bairroHelp" placeholder="Digite o nome do seu bairro...">
                            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Complemento</label>
                            <input type="text" name="complemento" class="form-control" id="complemento" aria-describedby="complementoHelp" placeholder="Casa, apartamento?">
                            <small id="complementoHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="form-group">
                            <label for="celular">CEP</label>
                            <input type="text" name="cep" class="form-control" id="cep" aria-describedby="cepHelp" placeholder="Digite o nome do seu bairro...">
                            <small id="cepHELP" class="form-text text-muted">campo obrigatório</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


<?php if(isset($_GET['erroCadastro'])){?>
    <script>
    $(document).ready(function (){
        $('#modalCadastro').modal('show');

    });
</script>
<?php }?>



</body>
</html>