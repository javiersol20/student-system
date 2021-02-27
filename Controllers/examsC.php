<?php


class ExamsC
{
    public function CreateExamC()
    {
        if(isset($_POST["estado"])){

            $tablaBD = "examenes";

            $id_carrera = $_POST["id_carrera"];

            $datosC = array("estado"=>$_POST["estado"], "id_carrera"=>$_POST["id_carrera"], "id_materia"=>$_POST["id_materia"], "profesor"=>$_POST["profesor"], "aula"=>$_POST["aula"], "fecha"=>$_POST["fecha"], "hora"=>$_POST["hora"]);

            $resultado = ExamsM::CreateExamM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

				window.location = "http://localhost/project-01/Crear-Examenes/'.$id_carrera.'";
				</script>';

            }

        }
    }
    static public function ViewExamnsC($columna, $valor)
    {
        $tablaBD = "examenes";

        $resultado = ExamsM::ViewExamnsM($tablaBD, $columna, $valor);

        return $resultado;
    }
    public function RegisterExamC()
    {
        if(isset($_POST["id_alumno"])){

            $tablaBD = "insc_examenes";

            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_examen"=>$_POST["id_examen"], "libreta"=>$_POST["libreta"]);

            $id_carrera = $_POST["id_carrera"];

            $resultado = ExamsM::RegisterExamM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

				window.location = "http://localhost/project-01/Ver-Examenes/'.$id_carrera.'";
				</script>';
            }

        }
    }
    public function ViewRegistersExamC($columna, $valor)
    {

        $tablaBD = "insc_examenes";

        $resultado = ExamsM::ViewRegistersExamM($tablaBD, $columna, $valor);

        return $resultado;

    }
}