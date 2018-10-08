<?php
session_start();
if(!isset ($_SESSION['login']) and !isset ($_SESSION['senha']))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    $logado = false;
}else{
    $logado = true;
}
?>
<style>
    .nav-link{
        color: #455313 !important;
        border-top: 2px solid transparent !important;
        border-bottom: 2px solid transparent !important;
    }
    .nav-link:hover{
        border-top: 2px solid !important;
        border-bottom: 2px solid !important;
        border-color: #455313 !important;
    }
    .navLogo1{
        width: 100% !important;
        height: 100% !important;
    }
    .navBar1{
        font-size: 120%;
    }
    .navLogo2{
        width: 60% !important;
        height: 60% !important;
    }
    .navBar2{
        font-size: 60%;
    }
    .navbar{
        height: 19% !important;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="assets/img/logo.png" class="d-inline-block align-top navLogo1 mt-sm-0" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navBar1" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-success" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="#">QUEM SOMOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="deixarRecado.php">FALE CONOSCO</a>
            </li>

            <?php if(isset($_SESSION['login']) && $_SESSION['adm'] == 1) {?>
            <li class="nav-item">
                 <a class="nav-link" href="adm.php"><span class="text-danger">ÁREA ADMINISTRATIVA</a>
            </li>
            <?php }?>

        </ul>
<!--        usuario logado ou nao-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <?php if(isset($_SESSION['login'])) {?>
                <li>
                    <a class="nav-link text-success" href="carrinho.php"><i class="fa fa-cart-plus" style="font-size: 120%;"></i></a>
                </li>
                <li>
                    <a class="nav-link text-success" href="minhaConta.php"><i class="fa fa-user" style="font-size: 120%;"></i></a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <?php if(isset($_SESSION['login'])) {?>
                        <a class="nav-link text-success" href="logout.php"><span class="text-danger">SAIR:</span> <?= $_SESSION['login']?></a>
                    <?php }else{ ?>
                        <a class="nav-link text-success" href="login.php">ENTRAR</a>
                    <?php }?>
                </li>
            </ul>
        </div>
    </div>
</nav>