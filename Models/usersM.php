<?php

require_once "ConnectionDB.php";

class UsersM extends ConnectionDB
{
    static public function LoginM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE libreta = :libreta");

        $pdo->bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();
        $pdo = null;
    }

    static public function GetMyDataM($tablaDB, $id)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaDB WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }

    static public function EditDataM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, clave = :clave, correo = :correo, preparatoria = :preparatoria, pais = :pais WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":preparatoria", $datosC["preparatoria"], PDO::PARAM_STR);
        $pdo->bindParam(":pais", $datosC["pais"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }

    static public function CreateUserM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (libreta, clave, apellido, nombre, id_carrera, rol) VALUES (:libreta, :clave, :apellido, :nombre, :id_carrera, :rol)");

        $pdo->bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    }

    static public function GetUsersM($tablaBD1, $tablaBD2, $columna, $valor)
    {
        if ($columna != "null") {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD1 WHERE $columna = :$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            return $pdo->fetch();
        } else {

            $pdo = ConnectionDB::cDB()->prepare("SELECT u.id AS 'idUser',u.nombre,u.apellido,u.rol, u.libreta, u.clave, c.nombre AS 'carrera', u.id_carrera
                                                   FROM $tablaBD1 AS u INNER JOIN $tablaBD2 AS c ON c.id = u.id_carrera");
            $pdo->execute();
            return $pdo->fetchAll();
        }

        $pdo->close();
        $pdo = null;
    }

    static public function GetUsersM2($tablaBD1, $columna, $valor)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD1 WHERE $columna = :$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }

    static public function UpdateUserM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, libreta = :libreta,
                                                    clave = :clave, id_carrera = :id_carrera, rol = :rol WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }

    static public function DeleteUserC($tablaBD, $id)
    {
        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }
}















