<?php
include_once 'Classes/Planta.php';

if($_POST['nomePopular'] != null && $_POST['nomeCientifico'] != null && $_POST['alturaMax'] != null &&
    $_POST['cuidados'] != null && $_POST['preco'] != null && $_POST['descricao'] != null && $_POST['estoque']!= null
    && $_POST['preco'] != null){
    $p = new Planta();
    $dd = $p->getID();
    $idQuery = (object) $dd[0];
    $id = $idQuery->idzao + 1;
    $dados = array(
        'id' => $id,
        'nomePopular' => $_POST['nomePopular'],
        'nomeCientifico' => $_POST['nomeCientifico'],
        'alturaMax' => $_POST['alturaMax'],
        'cuidados'  => $_POST['cuidados'],
        'descricao' => $_POST['descricao'],
        'estoque' => $_POST['estoque'],
        'preco' => $_POST['preco']
    );
    $data = $p->addPlanta($dados);

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
                    'idPlanta' => $id,
                    'nome' => $nomep
                );
                $p->addImagem($queryDados);
            }
        }
        $arquivo = isset($_FILES['icone']) ? $_FILES['icone'] : FALSE;
        $destino = "imagens/img_icone_".time();
        $nomep = "img_icone_".time();
        if(move_uploaded_file($arquivo['tmp_name'][0], $destino)){

            $p = new Planta();
            $queryDados = array(
                'idPlanta' => $id,
                'nome' => $nomep
            );
            $p->addIcone($queryDados);
        }

        header("Location: adicionarPlanta.php");
        exit();

    }


    //echo json_encode($data);

}else{
    $mensagem = urlencode('Preencha todos os campos !');
    header('Location: adicionarPlanta.php?erro='.$mensagem);
    exit();
}
?>