<?php
// session_start inicia a sessão
@session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
include_once 'Classes/Usuario.php';
$u = new Usuario();

if(isset($_POST['login']) && isset($_POST['senha'])){
    $login = $_POST['login'];
    $query = $u->getHash($login);


}else{
    $query = 0;
}
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(count($query) > 0 && password_verify($_POST['senha'], $query[0]['senha']))
{
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $query[0]['nome'];
    $_SESSION['sobrenome'] = $query[0]['sobrenome'];
    $_SESSION['email'] = $query[0]['email'];
    $_SESSION['adm'] = $query[0]['adm'];
    $_SESSION['carrinho'] = array();
    header('location:index.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['nome']);
    unset ($_SESSION['sobrenome']);
    unset ($_SESSION['email']);
    unset ($_SESSION['adm']);
    $message = urlencode("Usuario ou senha incorretos ! ");
    header("Location: login.php?errologin=".$message);
}
?>