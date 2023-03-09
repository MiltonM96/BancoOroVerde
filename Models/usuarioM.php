<?php require_once 'conexionBD.php' ?>
<?php

class Usuario
{
    private $conexion;
    private $nusuario;
    private $clave;
    private $email;
    private $nombre;
    private $apellido;
    private $dni;
    private $saldo = 0;


    public function __construct()
    {
        $this->conexion = ConexionBD::getCBD();
    }

    public function agregarSaldo($saldo)
    {

        if (ctype_digit($saldo) == true) {
            $this->saldo += $saldo;
        }
    }

    public function quitarSaldo($saldo)
    {

        if (ctype_digit($saldo) == true) {
            $this->saldo -= $saldo;
        }
    }

    public function setClave($clave)
    {
        print($clave);

        if (ctype_alnum($clave) == true) {
            $this->clave = $clave;
            echo "entro clave </br>";
        }
    }

    public function setDni($dni)
    {

        if (ctype_digit($dni) == true) {
            $this->dni = $dni;
            echo "entro dni </br>";
        }
    }

    public function setNUsuario($nusuario)
    {
        if (ctype_alpha($nusuario) == true) {
            $this->nusuario = $nusuario;
            echo "entro nusuario </br>";
        }
    }


    public function setApellido($apellido)
    {
        if (ctype_alpha($apellido) == true) {
            $this->apellido = $apellido;
            echo "entro ape </br>";
        }
    }


    public function setNombres($nombres)
    {
        if (ctype_alpha($nombres) == true) {
            $this->nombre = $nombres;
            echo "entro nombre </br>";
        }
    }

    private function valid_email($str)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

    public function setEmail($email)
    {
        if ($this->valid_email($email)) {
            $this->email = $email;
            echo "entro mail </br>";
        }
    }


    public function addData($nusuario, $email, $clave, $nombre, $apellido, $dni)
    {
        $this->setNUsuario($nusuario);
        $this->setClave($clave);
        $this->setEmail($email);
        $this->setNombres($nombre);
        $this->setApellido($apellido);
        $this->setDni($dni);

        echo "termino el addData";
        echo "</br>";
        print($this->nusuario);
        echo "</br>";
        print($this->clave);
        echo "</br>";
        print($this->email);
        echo "</br>";
        print($this->nombre);
        echo "</br>";
        print($this->apellido);
        echo "</br>";
        print($this->dni);
        echo "</br>";
        print($this->saldo);
    }


    public function save()
    {
        $sql = "INSERT INTO usuario ( usuario, clave, correo, nombre, apellido, dni, saldo)
         VALUES (: usuario, : clave, : correo, : nombre, : apellido, : dni, : saldo)";
        // VALUES ('',".$this->nusuario.",'".$this->clave."','".$this->correo."','".$this->nombre."','".$this->apellido."','".$this->dni."','".$this->saldo."' )";
        $statement = $this->conexion->prepare("INSERT INTO usuario (USUARIO, CLAVE, CORREO, NOMBRE,APELLIDO,DNI,SALDO) VALUES (:nusuario, :clave, :email, :nombre, :apellido, :dni, :saldo)");
        // $statement = $this->conexion->prepare($sql);

        $statement->bindParam(':nusuario', $this->nusuario, PDO::PARAM_STR);
        $statement->bindParam(':clave', $this->clave, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $statement->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
        $statement->bindParam(':dni', $this->dni, PDO::PARAM_INT);
        $statement->bindParam(':saldo', $this->saldo, PDO::PARAM_STR);

        if ($statement->execute()) {
            return "Bien";
        } else {
            return "Error";
        }
        // $statement ->close();

        // var_dump($res);
        // $statement->execute([
        //     ':usuario' => $this->nusuario,
        //     ':clave'  => $this->clave,
        //     ':correo' => $this->correo,
        //     ' :nombre' => $this->nombre,
        //     ':apellido' => $this->apellido,
        //     ':dni' => $this->dni,
        //     ':saldo,' => $this->saldo,
        // ]);
    }


    public function update($idPersona)
    {

        $sql = "UPDATE personas SET documento='$this->documento',apellido='$this->apellido',nombres='$this->nombres' WHERE idPersona=$idPersona";

        $this->mysqli->query($sql);

        echo "Se ejecuta: <br>";

        echo $sql;
    }


    public function delete($idPersona)
    {

        $sql = "DELETE FROM personas WHERE idPersona=$idPersona";

        $this->mysqli->query($sql);

        echo "Se ejecuta: <br>";

        echo $sql;
    }
}
