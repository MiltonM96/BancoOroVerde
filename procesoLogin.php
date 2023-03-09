<?php require_once 'includes/head.php'; ?>
<?php require_once 'Models/conexionBD.php'; ?>
<?php
$bd = ConexionBD::getCBD();
if (!empty($_POST)) {
    $sql = "SELECT dni,usuario, clave FROM usuario WHERE usuario = '$_POST[usuario]' and clave = '$_POST[clave]'";
    foreach ($bd->query($sql) as $row) {
        $usr = $row['usuario'];
        $clave = $row['clave'];
        $id = $row['dni'];
    }
    print $clave;

    if (($_POST['usuario'] == "$usr") && ($_POST['clave'] == "$clave")) {
        session_start();
        if ($_SESSION['rand_code'] == $_POST['captcha']) {
            $_SESSION['logged'] = true;
            $_SESSION['name'] = $usr;
            $_SESSION['id'] = $id;
            header('Location: inicio.php');
            exit();
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
}


?>
<?php require_once 'includes/footer.php'; ?>