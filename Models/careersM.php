<?php

require_once "ConnectionDB.php";

class CareersM extends ConnectionDB
{

    //Crear Carrera
    static public function CreateCareersM($tablaBD, $carrera)
    {

        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");

        $pdo->bindParam(":nombre", $carrera, PDO::PARAM_STR);

        if ($pdo->execute()) {

            return true;

        }

        $pdo->close();
        $pdo = null;

    }


    //Ver Carreras
    static public function ViewCareersM($tablaBD, $columnaC, $valorC)
    {
        if($columnaC == "null" && $valorC == "null")
        {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");

            $pdo->execute();

            return $pdo->fetchAll();
        }else{
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columnaC = :$columnaC");
            $pdo->bindParam(":".$columnaC, $valorC, PDO::PARAM_INT);

            $pdo->execute();

            return $pdo->fetch();
        }


        $pdo->close();
        $pdo = null;

    }


    //Editar Carreras
    static public function EditCareersM($tablaBD, $id)
    {

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();
        $pdo = null;

    }


    //Actualizar Carreras
    static public function UpdateCareersM($tablaBD, $datosC)
    {

        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["carrera"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;

    }


    //Borrar Carreras
    static public function DeleteCareersM($tablaBD, $id)
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