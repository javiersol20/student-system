<?php

class CareersC
{

    //Crear Carrera
    public function CreateCareersC()
    {

        if (isset($_POST["carrera"])) {

            $tablaBD = "carreras";

            $carrera = $_POST["carrera"];

            $resultado = CareersM::CreateCareersM($tablaBD, $carrera);

            if ($resultado == true) {

                echo '<script>

				window.location = "Carreras";
				</script>';

            }

        }

    }


    //Ver Carreras
    static public function ViewCareersC($columnaC = "null",$valorC = "null")
    {


        $tablaBD = "carreras";

        $resultado = CareersM::ViewCareersM($tablaBD, $columnaC, $valorC);

        return $resultado;

    }

    static public function ViewCareerC($columnaC,$valorC)
    {
        $tablaBD = "carreras";
    }
    //Editar Carrera
    public function EditCareersC()
    {

        $tablaBD = "carreras";

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        $resultado = CareersM::EditCareersM($tablaBD, $id);

        echo '<div class="col-md-6 col-xs-12">
						
				<h2>Nombre de la Carrera:</h2>
				<input type="text" name="carrera" class="form-control input-lg" value="' . $resultado["nombre"] . '" required>

				<input type="hidden" name="Cid" value="' . $resultado["id"] . '">

				<br>
				<button class="btn btn-success" type="sutmit">Guardar Cambios</button>

			</div>';

    }


    //Actualizar Carreras
    public function UpdateCareersC()
    {

        if (isset($_POST["carrera"])) {

            $tablaBD = "carreras";

            $datosC = array("id" => $_POST["Cid"], "carrera" => $_POST["carrera"]);

            $resultado = CareersM::UpdateCareersM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>

				window.location = "http://localhost/project-01/Carreras";
				</script>';

            }

        }

    }


    //Borrar Carreras
    public function DeleteCareersC()
    {

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        if (isset($id)) {

            $tablaBD = "carreras";

            $resultado = CareersM::DeleteCareersM($tablaBD, $id);

            if ($resultado == true) {

                echo '<script>

				window.location = "http://localhost/project-01/Carreras";
				</script>';

            }

        }

    }


}