<?php

require_once "ConnectionDB.php";

class ExamsM extends ConnectionDB
{
    static public function CreateExamM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_carrera, id_materia, estado, aula, profesor, hora, fecha) VALUES (:id_carrera, :id_materia, :estado, :aula, :profesor, :hora, :fecha)");

        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo->bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo->bindParam(":aula", $datosC["aula"], PDO::PARAM_STR);
        $pdo->bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    }

    static public function ViewExamnsM($tablaBD, $columna, $valor)
    {
        if ($columna == null) {

            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");

            $pdo->execute();

            return $pdo->fetchAll();

        } else {

            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();

        }

        $pdo->close();
        $pdo = null;
    }

    static public function RegisterExamM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_alumno, id_examen, libreta) VALUES (:id_alumno, :id_examen, :libreta)");

        $pdo->bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo->bindParam(":id_examen", $datosC["id_examen"], PDO::PARAM_INT);
        $pdo->bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    }

    static public function ViewRegistersExamM($tablaBD, $columna, $valor)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetchAll();

        $pdo->close();
        $pdo = null;
    }
}