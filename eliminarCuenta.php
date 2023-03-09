<?php require_once 'Models/conexionBD.php'; ?>
<?php
session_start();
$bd = ConexionBD::getCBD();


$sql = ("DELETE FROM usuario where dni = '$_SESSION[id]'");

$bd->query($sql);

header('Location: index.php');
?>