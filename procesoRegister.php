<?php require_once 'Models/usuarioM.php'; ?>
<?php

if (!empty($_POST)) {
    print_r($_POST);
    $oUsuario = new Usuario();
    $oUsuario->addData($_POST['usuario'], $_POST['email'], $_POST['clave'], $_POST['nombre'], $_POST['apellido'], $_POST['dni']);
    $oUsuario->save();
    print_r($oUsuario);
}
?>
