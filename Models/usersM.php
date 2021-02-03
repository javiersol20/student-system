<?php

require_once "ConnectionDB.php";

class UsersM extends ConnectionDB
{
    static public function LoginM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FRP, $tablaBD WHERE libreta = :libreta");

        $pdo->bindParam(":libreta",$datosC["libreta"], PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();
        $pdo = null;
    }
}