<?php

require_once "ConnectionDB.php";

class SettingsM extends ConnectionDB
{
    static public function ViewSettingM($tablaBD,$columna,$valor)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
        $pdo->bindParam(":".$columna,$valor,PDO::PARAM_INT);
        $pdo->execute();

        return $pdo->fetch();
        $pdo -> close();
        $pdo = null;
    }
    static public function ChangeSemesterM($tablaBD,$semestre)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET semestre = :semestre WHERE id = 1");
        $pdo->bindParam(":semestre",$semestre,PDO::PARAM_STR);
        if($pdo->execute())
        {
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }
    static public function UpdateSettingsM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET 1_fecha_inicio = :1_fecha_inicio, 1_fecha_fin = :1_fecha_fin, 2_fecha_inicio = :2_fecha_inicio, 2_fecha_fin = :2_fecha_fin, examenes_i = :examenes_i, examenes_f = :examenes_f, materias_i = :materias_i, materias_f = :materias_f WHERE id = 1");
        $pdo -> bindParam(":1_fecha_inicio", $datosC["1_fecha_inicio"], PDO::PARAM_STR);
        $pdo -> bindParam(":1_fecha_fin", $datosC["1_fecha_fin"], PDO::PARAM_STR);
        $pdo -> bindParam(":2_fecha_inicio", $datosC["2_fecha_inicio"], PDO::PARAM_STR);
        $pdo -> bindParam(":2_fecha_fin", $datosC["2_fecha_fin"], PDO::PARAM_STR);
        $pdo -> bindParam(":examenes_i", $datosC["examenes_i"], PDO::PARAM_STR);
        $pdo -> bindParam(":examenes_f", $datosC["examenes_f"], PDO::PARAM_STR);
        $pdo -> bindParam(":materias_i", $datosC["materias_i"], PDO::PARAM_STR);
        $pdo -> bindParam(":materias_f", $datosC["materias_f"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    }
    static public function EnableCoursesM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET h_materias = :h_materias WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":h_materias", $datosC["h_materias"], PDO::PARAM_INT);
        if($pdo->execute())
        {
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }
    static public function DisableCourseM($tablaBD,$datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET h_materias = :h_materias WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":h_materias", $datosC["h_materias"], PDO::PARAM_INT);
        if($pdo->execute())
        {
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }
    static public function DeleteCoursesM($tablaBD)
    {
        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD");
        if($pdo->execute())
        {
            return true;
        }
        $pdo -> close();
        $pdo = null;
    }
}