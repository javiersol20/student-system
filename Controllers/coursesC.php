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
}