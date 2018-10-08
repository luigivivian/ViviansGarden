<?php
include_once 'Classes/Usuario.php';

if($_POST['senhaAtual'] != null && $_POST['senhaNova'] != null && $_POST['senhaNova2'] != null){//campos preenchidos

    if($_POST['senhaNova'] != $_POST['senhaNova2']){
        $mensagem = urlencode('Senhas não conferem!');
        header('Location: meusDados.php?erro='.$mensagem);
        exit();
    }
    $u = new Usuario();

    $query = $u->getById($_POST['id']);

    if(count($query) > 0 && password_verify($_POST['senhaAtual'], $query[0]['senha'])){
        $dados = array(
            'id' => $_POST['id'],
            'senha' => password_hash($_POST['senhaNova'], PASSWORD_DEFAULT)
    );
        if($u->alterarSenha($dados)){
            $mensagem = urlencode('Senha alterada com sucesso !');
            header('Location: meusDados.php?sucesso='.$mensagem);
            exit();
        }else{
            $mensagem = urlencode('Erro ao tentar alterar senha !');
            header('Location: meusDados.php?erro='.$mensagem);
            exit();
        }
    } else{
        $mensagem = urlencode('Senha invalida !');
        header('Location: meusDados.php?erro='.$mensagem);
        exit();
    }

}else{ //erro
    $mensagem = urlencode('Preencha todos os campos !');
    header('Location: meusDados.php?erro='.$mensagem);
    exit();
}