<?php

require_once "ConnectionDB.php";

class CertificatesM
{

    static public function RequestCertificateM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_alumno, estado, tipo) VALUES (:id_alumno, :estado, :tipo)");

        $pdo->bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    }


    static public function ViewCertificateM($tablaBD, $columna, $valor)
    {
        if ($columna == null) {

            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");

            $pdo->execute();

            return $pdo->fetchAll();

        } else {

            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetchAll();

        }

        $pdo->close();
        $pdo = null;
    }


    static public function UpdateStatusM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }
}