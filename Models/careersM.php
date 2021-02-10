<?php

require_once "ConnectionDB.php";

class CareersM extends ConnectionDB {

    //Crear Carrera
    static public function CrearCarreraM($tablaBD, $carrera){

        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

        if($pdo -> execute()){

            return true;

        }

        $pdo -> close();
        $pdo = null;

    }



    //Ver Carreras
    static public function VerCarrerasM($tablaBD){

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;

    }



    //Editar Carreras
    static public function EditarCarreraM($tablaBD, $id){

        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }



    //Actualizar Carreras
    static public function ActualizarCarrerasM($tablaBD, $datosC){

        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["carrera"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }



    //Borrar Carreras
    static public function BorrarCarrerasM($tablaBD, $id){

        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }



}