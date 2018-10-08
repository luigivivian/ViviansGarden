<?php
include_once 'Classes/Pedido.php';
$arquivo = isset($_FILES['comprovante']) ? $_FILES['comprovante'] : FALSE;

if($arquivo){
    //var_dump($arquivo);
    $destino = "imagens/img_comprovante_".time();
    $nomec = "img_comprovante_".time();
    //echo $arquivo['tmp_name'];
    if(move_uploaded_file($arquivo['tmp_name'], $destino)){
        $p = new Pedido();
        $id = $p->getidComprovante();
        //echo '<br>';
        //echo '<br>';
        //echo '<br>';
        //var_dump($id);
        $idComprovante = $id[0]['id'] + 1;
        $dados = array(
            'id' => $idComprovante,
            'nome' => $nomec
        );
        //var_dump($dados);
        $p->addComprovante($dados);
        //echo "aaaa";
        $dados = array(
            'id' => $_POST['idPedido'],
            'idComprovante' => $idComprovante
        );
        $p->addComprovantePedido($dados);
        //echo $_POST['idPedido'];
        header('Location: meusPedidos.php');
        exit();

    }
}