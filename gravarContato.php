<?php

include_once 'Classes/Usuario.php';
$u = new Usuario();

if($_POST['nome'] != null && $_POST['sobrenome'] != null && $_POST['email'] != null && $_POST['telefone'] != null && $_POST['msg'] != null){
    $dados = array(
        'nome' => $_POST['nome'],
        'sobrenome' => $_POST['sobrenome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'msg' => $_POST['msg']
    );
    if($u->cadastrarContato($dados)){
        $mensagem = urlencode('Contato realizado com sucesso, aguarde retorno !');
        header('Location: deixarRecado.php?sucesso='.$mensagem);
        exit();
    }else{
        $mensagem = urlencode('Erro ao cadastrarContato!');
        header('Location: deixarRecado.php?erro='.$mensagem);
        exit();
    }
}else{

    $mensagem = urlencode('Preencha todos os campos !');
    header('Location: deixarRecado.php?erro='.$mensagem);
    exit();
}
?>