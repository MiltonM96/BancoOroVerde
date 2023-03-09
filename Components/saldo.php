<?php require_once 'Models/conexionBD.php' ?>
<?php
$bd = ConexionBD::getCBD();

$sql = ("SELECT saldo FROM usuario where dni = '$_SESSION[id]'");
foreach ($bd->query($sql) as $row) {
    $saldo = $row['saldo'];
}

?>
<table class="content__saldo">
    <thead class="saldo-table__head">
        <tr>
            <th class="head--30">Tipo de Cuenta</th>
            <th class="head--10">Moneda</th>
            <th class="head--10">Estado</th>
            <th class="head--40">Nro de Cuenta</th>
            <th class="head--10">Saldo</th>
        </tr>
    </thead>
    <tbody class="saldo-table__body">
        <tr>
            <td>Caja de Ahorro</td>
            <td>$</td>
            <td>CANP</td>
            <td><?php echo $_SESSION['id']; ?></td>
            <td> $<?php echo $saldo; ?></td>
        </tr>
    </tbody>
</table>