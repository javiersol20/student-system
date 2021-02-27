<?php

require_once "ConnectionDB.php";

class CoursesM extends ConnectionDB
{

    static public function CreateCourseM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre, grado, tipo, programa)
                                                   VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :programa)");
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":grado", $datosC["grado"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":programa", $datosC["programa"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }


    static public function ViewCoursesM($tablaBD1, $columna, $valor)
    {
        if ($columna == "null" && $valor == "null") {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD1 ORDER BY grado, codigo ASC");
            $pdo->execute();
            return $pdo->fetchAll();
        } else {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD1 WHERE $columna = :$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $pdo->execute();
            return $pdo->fetch();
        }

        $pdo->close();
        $pdo = null;

    }


    static public function DeleteCoursesM($tablaBD, $id)
    {
        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    }


    static public function CreateCommissionM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_materia, c_maxima, horario, numero, dias) VALUES (:id_materia, :c_maxima, :horario, :numero, :dias)");
        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":c_maxima", $datosC["c_maxima"], PDO::PARAM_INT);
        $pdo->bindParam(":horario", $datosC["horario"], PDO::PARAM_STR);
        $pdo->bindParam(":numero", $datosC["numero"], PDO::PARAM_INT);
        $pdo->bindParam(":dias", $datosC["dias"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }


    static public function ViewCommissionsM($tablaBD, $columna, $valor, $row)
    {
        if ($row == null) {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $pdo->execute();
            return $pdo->fetchAll();
        } else {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
            $pdo->execute();
            return $pdo->fetch();
        }

        $pdo->close();
        $pdo = null;
    }


    static public function DeleteCommissionsM($tablaBD, $id)
    {
        $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }


    static public function AddNoteM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_alumno, libreta, id_materia, fecha, profesor, nota_final, estado) 
                                                    VALUES (:id_alumno, :libreta, :id_materia, :fecha, :profesor, :nota_final, :estado)");
        $pdo->bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo->bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }


    static public function ViewNotesM($tablaBD, $columna, $valor)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD
                                            WHERE $columna = :$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }

    static public function ViewNoteM($tablaBD, $columna, $valor)
    {
        $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD
                                            WHERE $columna = :$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }


    static public function ChangeNoteM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET fecha = :fecha, profesor = :profesor, nota_final = :nota_final, estado = :estado WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fecha", $datosC["fechaU"], PDO::PARAM_STR);
        $pdo->bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }


    static public function EnrollSubjectM($tablaBD, $datosC)
    {
        $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (id_materia, id_alumno, id_comision) VALUES (:id_materia, :id_alumno, :id_comision)");
        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo->bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();

        $pdo = null;

    }


    static public function SeeQuotaM($tablaBD, $columna, $valor, $row)
    {
        if ($row == "Null") {
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
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


    static public function RemoveRegistrationM($tablaBD, $id)
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