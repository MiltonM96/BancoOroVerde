<?php require_once 'Models/usuarioM.php' ?>
<?php require_once 'Models/conexionBD.php' ?>

<?php
session_start();
echo "entro al agregar saldo";
print($_POST['saldo']);
$bd = ConexionBD::getCBD();

$sql = ("SELECT saldo FROM usuario where dni = '$_SESSION[id]'");
foreach ($bd->query($sql) as $row) {
    $saldo = $row['saldo'];
}
$nuevo_saldo = $saldo - $_POST['saldo'];

$sql = ("UPDATE usuario SET SALDO = $nuevo_saldo WHERE dni = '$_SESSION[id]'");
$bd->query($sql);

header('Location: inicio.php');

?>
