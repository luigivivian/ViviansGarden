<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="assets/css/jquery-filestyle.css">

    <title>Atualizar dados</title>
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
    .remover{
        -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);

        border-width: 15px;
    }



</style>
<body>
<?php
include_once 'autentica.php';
include_once 'componentes/menu.php';
include_once 'Classes/Planta.php';
include_once 'Classes/Usuario.php';
$u = new Usuario();
$dados = $u->getByLogin($_SESSION['login']);

if(     $_POST['nome'] != null && $_POST['sobrenome'] != null && $_POST['celular'] != null &&
         $_POST['email'] != null && $_POST['cidade'] != null && $_POST['rua'] != null &&
        $_POST['numero'] != null && $_POST['bairro'] != null && $_POST['complemento'] != null &&
        $_POST['cep'] != null
){ //cadastra se dados nao forem nulos

        $dados = array(
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'sobrenome' => $_POST['sobrenome'],
            'email' => $_POST['email'],
            'celular' => $_POST['celular'],
            'complemento' => $_POST['complemento'],
            'cep' => $_POST['cep'],
            'rua' => $_POST['rua'],
            'bairro' => $_POST['bairro'],
            'cidade' => $_POST['cidade'],
            'numero' => $_POST['numero']
        );

        if($u->update($dados)){
            $dados = $u->getByLogin($_SESSION['login']);
        }

}
$dados = $u->getByLogin($_SESSION['login']);
?>


<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Você poderá atualizar seus dados cadastrais nessa pagina.</h1>
        </div>
    </div>

</div>

<div class="container">

    <form id="cadastro" method="POST">
        <?php if(isset($_GET['sucesso'])){?>
            <div id="erro">
                <div class="alert alert-success text-center" role="alert">
                    <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['sucesso']);?></b>
                </div>
            </div>
        <?php }?>
        <div class="form-group">
            <input type="text" hidden name="id" value="<?= $dados[0]['id'];?>" class="form-control" id="id">
            <label for="nome">ID</label>
            <input type="text" disabled name="idza" value="<?= $dados[0]['id'];?>" class="form-control" id="id2">
            <small id="nomeHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?= $dados[0]['nome'];?>" class="form-control" id="nome" aria-describedby="nomeHelp" placeholder="Digite seu nome...">
            <small id="nomeHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" value="<?= $dados[0]['sobrenome'];?>" class="form-control" id="sobrenome" aria-describedby="sobrenomeHelp" placeholder="Digite seu sobrenome...">
            <small id="nomeHELP" class="form-text text-muted">campo obrigatório</small>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" value="<?= $dados[0]['celular'];?>" class="form-control" id="celular" aria-describedby="loginHelp" placeholder="Digite seu celular para contato...">
            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="celular">Email</label>
            <input type="email" name="email" value="<?= $dados[0]['email'];?>" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu email...">
            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="celular">Cidade</label>
            <input type="text" name="cidade" value="<?= $dados[0]['cidade'];?>" class="form-control" id="cidade" aria-describedby="cidadeHelp" placeholder="Digite o nome da sua cidade...">
            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="celular">Rua</label>
            <input type="text" name="rua" class="form-control" value="<?= $dados[0]['rua'];?>" id="rua" aria-describedby="ruaHelp" placeholder="Digite o nome da sua rua...">
            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="celular">Número</label>
            <input type="number" name="numero" class="form-control" value="<?= $dados[0]['numero'];?>" id="numero" aria-describedby="numeroHelp" placeholder="Digite o número de sua casa...">
            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" class="form-control" value="<?= $dados[0]['bairro'];?>" id="bairro" aria-describedby="bairroHelp" placeholder="Digite o nome do seu bairro...">
            <small id="celularHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="bairro">Complemento</label>
            <input type="text" name="complemento" class="form-control" value="<?= $dados[0]['complemento'];?>" id="complemento" aria-describedby="complementoHelp" placeholder="Casa, apartamento?">
            <small id="complementoHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
        <div class="form-group">
            <label for="celular">CEP</label>
            <input type="text" name="cep" class="form-control" value="<?= $dados[0]['cep'];?>" id="cep" aria-describedby="cepHelp" placeholder="Digite o nome do seu bairro...">
            <small id="cepHELP" class="form-text text-muted">campo obrigatório</small>
        </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    </form>

    <button type="button" class="btn btn-primary btn-block mt-xl-4" data-toggle="modal" data-target="#exampleModal">
        Alterar Senha
    </button>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preencha os campos para se cadastrar.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if(isset($_GET['erro'])){?>
                    <div id="erro">
                        <div class="alert alert-danger text-center" role="alert">
                             <i class="fa fa-times-circle"></i><b><?= urldecode($_GET['erro']);?></b>
                        </div>
                    </div>
                <?php }?>
                <form method="POST" action="alterarSenha.php" style="height: 25rem;" class="mt-xl-4">
                    <div class="form-group">
                        <label for="senha">Senha Atual</label>
                        <input type="text" hidden name="id" value="<?= $dados[0]['id'];?>" class="form-control" id="id">
                        <input type="password" name="senhaAtual" class="form-control" id="senha" aria-describedby="senhaHelp" placeholder="Digite sua senha">
                        <small id="nomeCHELP" class="form-text text-muted">campo obrigatório</small>
                    </div>
                    <div class="form-group">
                        <label for="senha">Nova Senha</label>
                        <input type="password"  name="senhaNova" class="form-control" id="senha" aria-describedby="senhaHelp" placeholder="Digite sua senha">
                        <small id="nomeCHELP" class="form-text text-muted">campo obrigatório</small>
                    </div>
                    <div class="form-group">
                        <label for="senha">Confirme sua nova senha</label>
                        <input type="password"  name="senhaNova2" class="form-control" id="senha" aria-describedby="senhaHelp" placeholder="Digite sua senha...">
                        <small id="nomeCHELP" class="form-text text-muted">campo obrigatório</small>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Alterar Senha</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>



<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="assets/js/jquery-filestyle.min.js"></script>


<?php if(isset($_GET['erro'])){?>
    <script>
        $(document).ready(function (){
            $('#exampleModal').modal('show');

        });
    </script>
<?php }?>

<?php include_once 'componentes/footer.php'; ?>
</body>
</html>