<?php
include_once 'Classes/Usuario.php';

$u = new Usuario();


//validando dados
if($_POST['nome'] != null && $_POST['sobrenome'] != null && $_POST['login'] != null && $_POST['senha'] != null &&
    $_POST['celular'] != null && $_POST['email'] != null && $_POST['cidade'] != null && $_POST['rua'] != null &&
    $_POST['numero'] != null && $_POST['bairro'] != null && $_POST['complemento'] != null && $_POST['cep'] != null){ //cadastra se dados nao forem nulos
    if($_POST['senha'] != $_POST['senha2']){ //validando senha
        $mensagem = urlencode('As senhas devem ser iguais !');
        header('Location: login.php?erroCadastro='.$mensagem);
        exit();
    }
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $senha2 = password_hash($_POST['senha2'], PASSWORD_DEFAULT);

    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $numero = $_POST['nuumero'];
    $complemento = $_POST['complemento'];
    $celular = $_POST['celular'];


    $verificarLogin = $u->getByLogin($login);
    //verificando se já existe algum login com esse nome cadastrado
    foreach($verificarLogin as $v){
        if($v['login'] == $login){
            $mensagem = urlencode('LOGIN JÁ CADASTRADO !');
            header('Location: login.php?erroCadastro='.$mensagem);
            exit();
        }
    }

    $dados = array(
        'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
        'nome' => $_POST['nome'],
        'sobrenome' => $_POST['sobrenome'],
        'login' => $_POST['login'],
        'email' => $_POST['email'],
        'celular' => $_POST['celular'],
        'complemento' => $_POST['complemento'],
        'cep' => $_POST['cep'],
        'rua' => $_POST['rua'],
        'bairro' => $_POST['bairro'],
        'cidade' => $_POST['cidade'],
        'numero' => $_POST['numero']
    );


    if($u->novoUsuario($dados)){ //efetuando cadastro
        $mensagem = urlencode('Cadastro efetuado, realize seu login !');
        header('Location: login.php?sucesso='.$mensagem);
        exit();
    }else{  //erro ao cadastrar
        $mensagem = urlencode('Erro ao cadastrar tente novamente !');
        header('Location: login.php?erroCadastro='.$mensagem);
        exit();
    }
}else{ //dados nulos
    $mensagem = urlencode('Preencha todos os campos !');
    header('Location: login.php?erroCadastro='.$mensagem);
    exit();
}


