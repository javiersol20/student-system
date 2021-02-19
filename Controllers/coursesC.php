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
    static public function ViewCoursesC()
    {
        $tablaBD1 = "materias";

        $respuesta = CoursesM::ViewCoursesM($tablaBD1);

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
}