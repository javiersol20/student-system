<?php

require_once "ConnectionDB.php";

class CoursesM extends ConnectionDB
{
    static public function CreateCourseM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre, grado, tipo, programa)
                                                   VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :programa)");
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":codigo",$datosC["codigo"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":grado", $datosC["grado"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":programa", $datosC["programa"], PDO::PARAM_STR);

        if($pdo->execute())
        {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }
    static public function ViewCoursesM($tablaBD1)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD1 ORDER BY grado, codigo ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;

    }
    static public function DeleteCoursesM($tablaBD,$id)
    {
        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    }
}