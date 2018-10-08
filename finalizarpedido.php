<?php
@session_start();
$user = $_SESSION['login'];
include_once 'Classes/Usuario.php';
include_once 'Classes/Pedido.php';
include_once 'Classes/Planta.php';

if(count($_SESSION['carrinho']) == 0){

}else{
    $p = new Pedido();
    $u = new Usuario();
    $pl = new Planta();
    $itensFalta = array();
    var_dump($_SESSION['carrinho']);
    $idPedido = $p->getIDPedido()[0]['id'];
    $idUsuario = $u->getByLogin($user);
    if($idPedido == NULL){
        $idPedido = 1;
        echo 'idPedido:'.$idPedido;
    }else{
        $idPedido += 1;
    }

    $total = 0;
    foreach($_SESSION['carrinho'] as $i){
        $total += ($i['preco'] * $i['qtd']);
    }
    echo 'Total Pedido:' .$total;
    $now = new DateTime();
    $datetime = $now->format('Y-m-d H:i:s');
    $p = new Pedido();
    $dados = array(
        'id' => $idPedido,
        'valorTotal' => $total,
        'idUsuario' => $idUsuario[0]['id'],
        'data' => $datetime,
        'status' => "Aguardando comprovante."
    );
    $p->novoPedido($dados);
    //novo pedido


//percorrer carrinho inserindo itens do pedido
    var_dump($_SESSION['carrinho']);
    foreach($_SESSION['carrinho'] as $i){
        $dados = array(
            'idPedido'      => $idPedido,
            'idPlanta'      => $i['idItem'],
            'valorUnidade'  => $i['preco'],
            'quantidade'    => $i['qtd']
        );
        $p->pedidoAddItem($dados); //inserindo itens do pedido
        $dados = array(
            'id' => $i['idItem'],
            'estoque' => $i['qtd']
        );
        $pl->diminuirEstoque($dados);
    }

    $_SESSION['carrinho'] = array();

    header('Location: instrucaoPagamento.php');
    exit();
//update na tabela planta (quantidade)

//ao cancelar um pedido devolver quantidade na tabela planta


}
