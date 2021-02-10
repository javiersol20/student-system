<?php

class CareersC{

    //Crear Carrera
    public function CrearCarreraC(){

        if(isset($_POST["carrera"])){

            $tablaBD = "carreras";

            $carrera = $_POST["carrera"];

            $resultado = CareersM::CrearCarreraM($tablaBD, $carrera);

            if($resultado == true){

                echo '<script>

				window.location = "Carreras";
				</script>';

            }

        }

    }




    //Ver Carreras
    public function VerCarrerasC(){

        $tablaBD = "carreras";

        $resultado = CareersM::VerCarrerasM($tablaBD);

        return $resultado;

    }



    //Editar Carrera
    public function EditarCarreraC(){

        $tablaBD = "carreras";

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        $resultado = CareersM::EditarCarreraM($tablaBD, $id);

        echo '<div class="col-md-6 col-xs-12">
						
				<h2>Nombre de la Carrera:</h2>
				<input type="text" name="carrera" class="form-control input-lg" value="'.$resultado["nombre"].'" required>

				<input type="hidden" name="Cid" value="'.$resultado["id"].'">

				<br>
				<button class="btn btn-success" type="sutmit">Guardar Cambios</button>

			</div>';

    }


    //Actualizar Carreras
    public function ActualizarCarrerasC(){

        if(isset($_POST["carrera"])){

            $tablaBD = "carreras";

            $datosC = array("id"=>$_POST["Cid"], "carrera"=>$_POST["carrera"]);

            $resultado = CareersM::ActualizarCarrerasM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

				window.location = "http://localhost/project-01/Carreras";
				</script>';

            }

        }

    }




    //Borrar Carreras
    public function BorrarCarrerasC(){

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        if(isset($id)){

            $tablaBD = "carreras";

            $resultado = CareersM::BorrarCarrerasM($tablaBD, $id);

            if($resultado == true){

                echo '<script>

				window.location = "http://localhost/project-01/Carreras";
				</script>';

            }

        }

    }



}