<?php

require_once "ConnectionDB.php";

class UsersM extends ConnectionDB
{
    static public function LoginM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE libreta = :libreta");

        $pdo->bindParam(":libreta",$datosC["libreta"], PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();
        $pdo = null;
    }
    static public function GetMyDataM($tablaDB,$id)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaDB WHERE id = :id");
        $pdo->bindParam(":id",$id,PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }
    static public function EditDataM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, clave = :clave, correo = :correo, preparatoria = :preparatoria, pais = :pais WHERE id = :id");
        $pdo->bindParam(":id",$datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fechanac",$datosC["fechanac"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion",$datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono",$datosC["telefono"], PDO::PARAM_INT);
        $pdo->bindParam(":clave",$datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":correo",$datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":preparatoria",$datosC["preparatoria"], PDO::PARAM_STR);
        $pdo->bindParam(":pais",$datosC["pais"], PDO::PARAM_STR);

        if($pdo->execute())
        {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }
}