<?php

class ConexionBD
{
    private static $Entity = NULL;
    static private function cBD()
    {
        try {
            $dbhost = 'localhost';
            $dbname = 'banco';
            $dbuser = 'root';
            $dbpass = '';
            $bd = new PDO(
                "mysql:host=$dbhost;dbname=$dbname",
                $dbuser,
                $dbpass
            );
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage() . "<br/>";
            die();
        }
        return $bd;
    }
    static public function getCBD()
    {
        if (isset($Entity)) {
            return $Entity;
        } else {
            $Entity = self::cBD();
            return $Entity;
        }
    }
}
