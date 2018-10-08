<?php
if(isset($_GET['add']) && isset($_POST['qtd'])){ //pegando dados do form
    @session_start();
    $qtd = $_POST['qtd'];
    $idItem = $_GET['add'];
    $preco = $_GET['preco'];
    $dados = array('qtd' => $qtd, 'idItem' =>$idItem, 'preco' => $preco);
    array_push($_SESSION['carrinho'], $dados);
    header("Location: carrinho.php");
    exit();
}