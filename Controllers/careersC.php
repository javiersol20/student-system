<?php



class CareersC
{
    public function AddCareersC()
    {
        if(isset($_POST["carrera"]))
        {
            if(!empty($_POST["carrera"]) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["carrera"]))
            {
                $carrera = $_POST["carrera"];
                $tablaBD = "carreras";
                $respuesta = CareersM::AddCareersM($tablaBD,$carrera);

                if($respuesta == true)
                {
                    echo '<script>
                            window.location = "Carreras";
                            </script>';
                }else{
                    echo '<br> <div class="alert-danger">Ha ocurrido un error</div>';

                }
            }else{
                echo '<br> <div class="alert-danger">El campo carrera no puede ir vacio Y/O con caracteres especiales</div>';
            }
        }
    }
}