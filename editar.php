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

    <title>Editar planta</title>
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
?>

<!--VERIFICAR SE O USUARIO TEM PERMISSION(administrador) PARA ACESSAR ESSA AREA-->
<?php

$p = new Planta();
if(isset($_GET['op']) && $_GET['op'] == 'editar' && isset($_GET['id'])){ //editar planta
    $dados = $p->getAll($_GET['id']);
    $imagens = true;
    if(count($dados) == 0){
        $imagens = false;
        $dados = $p->getDados($_GET['id']);
    }
}
if(isset($_GET['op']) && $_GET['op'] == 'editar' && isset($_GET['id']) && isset($_GET['save'])){ //update
    //nomePopular=:nomePopular, preco=:preco, idCategoria=:idCategoria, estoque=:estoque
    $dados = null;
    $dados = array(
        'id' => $_GET['id'],
        'nomePopular' => $_POST['nomePopular'],
        'nomeCientifico' => $_POST['nomeCientifico'],
        'alturaMax' => $_POST['alturaMax'],
        'estoque' => $_POST['estoque'],
        'preco' => $_POST['preco'],
        'descricao' => $_POST['descricao'],
        'cuidados' => $_POST['cuidados']
    );
    $q = $p->update($dados);

}

if(isset($_GET['op']) && $_GET['op'] == 'editar' && isset($_GET['del']) && isset($_GET['id'])){
    foreach($_GET['del'] as $nome){
        $del = $p->delImagem($nome);
    }
    if($del){
        $url = "editar.php?op=editar&id=".$_GET['id'];
        echo "<script type=\"text/javascript\">location.href = \"$url\";</script>";
    }
}
if(isset($_FILES['arquivo'])){
    $diretorio = "imagens/";
    if(!is_dir($diretorio)){
        echo "Pasta $diretorio nao existe";
    }else{
        $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
        for ($controle = 0; $controle < count($arquivo['name']); $controle++){
            $destino = $diretorio."/"."img_$controle".time();
            $nomep = "img_$controle".time();
            if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
                $p = new Planta();
                $queryDados = array(
                    'idPlanta' => $_GET['id'],
                    'nome' => $nomep
                );
                $p->addImagem($queryDados);
            }
        }
        $url = "editar.php?op=editar&id=".$_GET['id'];
        echo "<script type=\"text/javascript\">location.href = \"$url\";</script>";
    }
}
?>
<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Ádicione novas plantas ao site.</h1>
        </div>
    </div>
    <input type="hidden" id="idzao" name="idzao" value="<?= $_GET['id'];?>">
</div>
<div class="container">
    <form id="planta" enctype="multipart/form-data" method="POST" action="editar.php?op=editar&id=<?=$_GET['id'];?>&save=true">
        <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input type="text" name="id" value="<?= $_GET['id']; ?>" id="id" disabled class="form-control" aria-describedby="emailHelp" placeholder="">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nome Popular</label>
            <input type="text" value="<?= $dados[0]['nomePopular']; ?>" name="nomePopular" class="form-control" id="nomeP" aria-describedby="emailHelp" placeholder="Digite o nome da planta">
            <small id="nomePHELP" class="form-text text-muted">campo obrigatório</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Nome Cientifico</label>
            <input type="text" value="<?= $dados[0]['nomeCientifico']; ?>" name="nomeCientifico" class="form-control" id="nomeC" aria-describedby="emailHelp" placeholder="Digite o nome cientifico da planta">
            <small id="nomeCHELP" class="form-text text-muted">campo obrigatório</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Altura Máxima</label>
            <input type="number" value="<?= $dados[0]['alturaMax']; ?>" name="alturaMax" step="0.1" class="form-control" id="alturaMax" aria-describedby="emailHelp" placeholder="Altura máxima">
            <small id="alturaHELP" class="form-text text-muted">campo obrigatório</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Quantidade em estoque</label>
            <input type="number" value="<?= $dados[0]['estoque']; ?>" name="estoque" step="1" class="form-control" id="estoque" aria-describedby="estoque" placeholder="Quantidade disponivel em estoque">
            <small id="qtdHelp" class="form-text text-muted">campo obrigatório</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Preço</label>
            <input type="number" value="<?= $dados[0]['preco']; ?>" name="preco" step="0.1" class="form-control" id="estoque" aria-describedby="estoque" placeholder="Quantidade disponivel em estoque">
            <small id="precoHELP" class="form-text text-muted">campo obrigatório</small>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição </label>
            <textarea name="descricao" class="form-control" id="descricao" rows="3"><?= $dados[0]['descricao']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Cuidados</label>
            <textarea name="cuidados"  class="form-control" id="cuidados" rows="3"><?= $dados[0]['cuidados']; ?></textarea>
        </div>

        <div id="inputImg">
            <h5 class="text-dark">Deseja adicionar novas imagens?</h5>
            <input id="imgs" type="file" name="arquivo[]" multiple="multiple" /><br><br>
        </div>

        <div class="modal-footer">
            <button type="submit" id="salvar" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
<?php if($imagens != false){?>
    <div id="imgs" class="container">
        <h3 class="text-center">Selecione as imagens que deseja excluir !</h3>
        <div class="row mt-1 mb-2">
            <?php
            $cont = 1;
            foreach ($dados as $v){
                if($cont == 1 ){
                    echo '<div class="row mt-3 mb-2">';
                }

                ?>
                <div class="col">
                    <img onclick="img(<?= $v['nome']; ?>, <?= $v['nome'];?>)" id="<?= $v['nome'];?>" class="card-img-top" src="imagens/<?= $v['nome'];?>" alt="Card image cap" style="border-color: #467505; border-style: solid;">
                </div>
                <?php if($cont == 3){ $cont = 0; echo '</div>';} $cont++;?>
            <?php }?>
        </div>
        <button class="btn-danger btn btn-block mb-5" onclick="deletarImagens()">- Deletar -</button>
    </div>
<?php }else{?>
    <div class="mb-xl-5 mt-xl-3">
        <h3 class="text-center">Nenhuma imagem cadastrada !</h3>
    </div>
<?php }?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="assets/js/jquery-filestyle.min.js"></script>

<script type="text/javascript">
    var imagens = [];
    function img(nomeImagen, idElemento){
        //alert(nomeImagen);
        //alert(idElemento);
        if($(idElemento).hasClass('remover')){
            $(idElemento).removeClass('remover');
            for (var i = 0; i < imagens.length; i++) {
                if(imagens[i] == nomeImagen){
                    imagens.splice(i, 1);
                }
            }
        }else{
            $(idElemento).addClass('remover');
            imagens.push(nomeImagen);
            for (var i = 0; i < imagens.length; i++) {
                console.log(imagens[i]);
            }
        }
    }
    function deletarImagens(){
        //alert($('#btnDel').val());
        var url = '';
        var id = document.getElementById("idzao").value;
        if(imagens.length < 1){
            return;
        }
        for (var i = 0; i < imagens.length; i++) {

            var idImagem = $(imagens[i]).attr('id')
            url = url + '&del[]='+idImagem;

        }
        window.location.href = 'editar.php?op=editar&id='+id + url;

       //

    }
</script>

<?php include_once 'componentes/footer.php'; ?>
</body>
</html>