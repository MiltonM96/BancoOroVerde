<?php require_once 'includes/head.php'; ?>
<?php
    session_start();
    if(!$_SESSION['logged']){
        header('Location: index.php');
        exit();
    }
?>
<?php require_once 'includes/loggedNavBar.php';?>
<!-- <div class="inicio__main-wrapper"> -->
    <div class="side__menu">
        <div class="menu__buttons" >
            <div class="top__buttons">
                <div class="buttons" ><a href="inicio.php?tab=saldo"><img src="https://img.icons8.com/small/32/C850F2/money-box.png"/><br/>Saldo</a></div>
                <div class="buttons"><a href="inicio.php?tab=retirar"><img src="https://img.icons8.com/ios/32/C850F2/cash-in-hand.png"/><br/>Retirar</a></div>
                <div class="buttons"><a href="inicio.php?tab=depositar"><img src="https://img.icons8.com/external-obvious-line-kerismaker/32/C850F2/external-cash-out-ecommerce-lineart-obvious-line-kerismaker.png"/><br/>Depositar</a></div>
                <div class="buttons"><a href="inicio.php?tab=micuenta"><img src="https://img.icons8.com/fluency-systems-regular/32/C850F2/guest-male.png"/><br/>Mi Cuenta</a></div>
            </div>
            <div class="bottom__buttons">
                <div class="buttons"><a href="inicio.php?tab=saldo"><img src="https://img.icons8.com/external-inkubators-basic-outline-inkubators/32/FD7E14/external-log-out-user-interface-inkubators-basic-outline-inkubators.png"/><br/>Salir</a></div>
            </div>
        </div>
    </div>
    <div class="main__content">
    <?php
    if(isset($_GET['tab'])){
        switch($_GET['tab']){
            case 'saldo':
                include_once "./components/saldo.php";
                break;
            case 'depositar':
                include_once "./components/depositar.php";
                break;
            case 'retirar':
                include_once "./components/retirar.php";
                break;
            case 'micuenta':
                include_once "./components/micuenta.php";
                break;
            default: echo "<p class='danger'>No se encontro la pagina que desa visitar</p>";
                include_once "./components/saldo.php";
                break;
        }
    }else{
        include_once "./components/saldo.php";
    }
    ?>

    </div>

<!-- </div> -->

<?php require_once 'includes/footer.php'; ?>