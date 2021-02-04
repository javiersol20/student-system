<?php

require_once "Models/ConnectionDB.php";

class CareersM extends ConnectionDB
{
    static public function AddCareersM($tablaBD,$carrera)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");
        $pdo->bindParam(":nombre",$carrera,PDO::PARAM_STR);
        if($pdo->execute())
        {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }
}