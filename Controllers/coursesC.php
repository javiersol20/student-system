<?php


class CoursesC
{
    public function CreateCourseC()
    {
        if(isset($_POST["Cid"]))
        {

            if(isset($_POST["Cid"]) && !empty($_POST["Cid"]) && isset($_POST["codigo"]) && !empty($_POST["codigo"])
            && isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["grado"])
            && !empty($_POST["grado"]) && isset($_POST["tipo"]) && !empty($_POST["tipo"]))
            {
              $rutaPrograma = "";
              if($_FILES["programa"]["type"] == "application/pdf")
              {
                  $nombre = mt_rand(10,999);
                  $rutaPrograma = "Views/programs/".$nombre.".pdf";

                  move_uploaded_file($_FILES["programa"]["tmp_name"], $rutaPrograma);
                  $tablaBD = "materias";
                  $Cid = $_POST["Cid"];
                  $datosC = [
                        "id_carrera" => $_POST["Cid"],
                        "codigo" => $_POST["codigo"],
                        "nombre" => $_POST["nombre"],
                        "grado" => $_POST["grado"],
                        "tipo" => $_POST["tipo"],
                        "programa" => $rutaPrograma
                  ];
                  $resultado = CoursesM::CreateCourseM($tablaBD,$datosC);
                  if($resultado == true)
                  {
                      echo '<script> window.location = "../Crear-Materias/'.$Cid.'"; </script>';
                  }
              }
            }else{
                echo '<script> alert("Todos los campos son obligatorios a excepción de: programa"); </script>';
        }

        }
    }
    static public function ViewCoursesC($columna = "null", $valor = "null")
    {
        $tablaBD1 = "materias";

        $respuesta = CoursesM::ViewCoursesM($tablaBD1,$columna,$valor);

        return $respuesta;
    }
    public function DeleteCoursesC()
    {
        if(isset($_GET["Mid"]))
        {
            $tablaBD = "materias";
            $id = $_GET["Mid"];
            $Cid = $_GET["Cid"];

            $resultado = CoursesM::DeleteCoursesM($tablaBD,$id);

            if($resultado == true)
            {
                echo '<script> window.location = "http://localhost/project-01/Crear-Materias/'.$Cid.'"; </script>';
            }

        }
    }
    public function CreateCommissionC()
    {
        if(isset($_POST["id_materia"]))
        {
            if(!empty($_POST["id_materia"]) && isset($_POST["numero"]) && !empty($_POST["numero"])
                && isset($_POST["c_maxima"]) && !empty($_POST["c_maxima"]) && isset($_POST["dias"])
                && !empty($_POST["dias"]) && isset($_POST["horarios"]) && !empty($_POST["horarios"]))
            {

                $tablaBD = "comisiones";
                $datosC = [
                    'id_materia' => $_POST["id_materia"],
                    'c_maxima' => $_POST["c_maxima"],
                    'horario' => $_POST["horarios"],
                    'numero' => $_POST["numero"],
                    'dias' => $_POST["dias"]
                ];
                $id_materia = $_POST["id_materia"];
                $respuesta = CoursesM::CreateCommissionM($tablaBD,$datosC);

                if($respuesta == true)
                {
                    echo '<script> window.location = "http://localhost/project-01/Crear-Comisiones/'.$id_materia.'"; </script>';
                }

            }else{
                echo '<script> alert("Todos los campos son obligatorios"); </script>';
            }
        }
    }
    static public function ViewCommissionsC($columna,$valor)
    {
        $tablaBD = "comisiones";
        $respuesta= CoursesM::ViewCommissionsM($tablaBD,$columna,$valor);
        return $respuesta;
    }
    public function DeleteCommissionsC()
    {
        if(isset($_GET["Mid"]))
        {
            $tablaBD = "comisiones";
            $id = $_GET["Cid"];
            $Mid = $_GET["Mid"];

            $resultado = CoursesM::DeleteCommissionsM($tablaBD,$id);

            if($resultado == true)
            {
                echo '<script> window.location = "http://localhost/project-01/Crear-Comisiones/'.$Mid.'"; </script>';

            }
        }
    }
    public function AddNoteC()
    {
        if(isset($_POST["id_alumno"]))
        {
            if(!empty($_POST["id_alumno"]) && isset($_POST["id_alumno"]) && !empty($_POST["libreta"])
                && isset($_POST["libreta"]) && !empty($_POST["libreta"]) && isset($_POST["id_carrera"])
                && !empty($_POST["id_carrera"]) && isset($_POST["id_materia"]) && !empty($_POST["id_materia"])
                && isset($_POST["fecha"]) && !empty($_POST["fecha"]) && isset($_POST["profesor"]) && !empty($_POST["profesor"]))
            {
                if($_POST["nota_final"] >= 9)
                {
                    $estado = "Aprobado";
                }elseif ($_POST["nota_final"] >= 6)
                {
                    $estado = "Regular";
                }elseif ($_POST["nota_final"] <= 5)
                {
                    $estado = "Desaprobado";
                }elseif ($_POST["nota_final"] === 0)
                {
                    $estado = "No cursado";
                }

                $tablaBD = "notas";
                $libreta = $_POST["libreta"];
                $id_carera = $_POST["id_carrera"];
                $datosC = [
                    "id_alumno" => $_POST["id_alumno"],
                    "libreta" => $_POST["libreta"],
                    "id_materia" => $_POST["id_materia"],
                    "fecha" => $_POST["fecha"],
                    "profesor" => $_POST["profesor"],
                    "nota_final" => $_POST["nota_final"],
                    "estado" => $estado
                ];

                $respuesta = CoursesM::AddNoteM($tablaBD,$datosC);

                if($respuesta == true)
                {
                    echo '<script> window.location = "http://localhost/project-01/Ver-Plan/'.$id_carera.'/'.$libreta.'" </script>';
                }
            }else{
                echo '<script> alert("Todos los campos son obligatorios"); </script>';
            }
        }
    }
    static public function ViewNotesC($columna, $valor)
    {
        $tablaBD = "notas";
        $respuesta = CoursesM::ViewNotesM($tablaBD,$columna,$valor);
        return $respuesta;
    }
    static public function ViewNoteC($columna, $valor)
    {
        $tablaBD = "notas";
        $respuesta = CoursesM::ViewNoteM($tablaBD,$columna,$valor);
        return $respuesta;
    }
    public function ChangeNoteC()
    {
        if(isset($_POST["id_alumno"]))
        {
            if(!empty($_POST["id_alumno"]) && isset($_POST["id_alumno"]) && !empty($_POST["libreta"])
                && isset($_POST["libreta"]) && !empty($_POST["libreta"]) && isset($_POST["id_carrera"])
                && !empty($_POST["id_carrera"]) && isset($_POST["id_materia"]) && !empty($_POST["id_materia"])
                && isset($_POST["fecha"]) && !empty($_POST["fecha"]) && isset($_POST["profesor"]) && !empty($_POST["profesor"]))
            {
                if($_POST["nota_final"] >= 9)
                {
                    $estado = "Aprobado";
                }elseif ($_POST["nota_final"] >= 6)
                {
                    $estado = "Regular";
                }elseif ($_POST["nota_final"] <= 5)
                {
                    $estado = "Desaprobado";
                }elseif ($_POST["nota_final"] === 0)
                {
                    $estado = "No cursado";
                }
                $tablaBD = "notas";
                $libreta = $_POST["libreta"];
                $id_carera = $_POST["id_carrera"];
                $datosC = [
                    "id" => $_POST["nota_id"],
                    "fechaU" => $_POST["fecha"],
                    "profesor" => $_POST["profesor"],
                    "nota_final" => $_POST["nota_final"],
                    "estado" => $estado
                ];
                $resultado = CoursesM::ChangeNoteM($tablaBD,$datosC);
                if($resultado == true)
                {
                    echo '<script> window.location = "http://localhost/project-01/Ver-Plan/'.$id_carera.'/'.$libreta.'" </script>';
                }
            }else{
                echo '<script> alert("Todos los campos son obligatorios"); </script>';
            }
        }
    }
}