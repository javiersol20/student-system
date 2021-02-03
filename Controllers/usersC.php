<?php


class UsersC
{
    public function Login()
    {
        if(isset($_POST["libreta"]))
        {
            # Evitar sql inyection
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["libreta"]) && preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave"]))
            {
                $tablaBD = "usuarios";

                $datosC = ["libreta" => $_POST["libreta"], "clave" => $_POST["clave"]];

                $resultado = UsersM::LoginM($tablaBD,$datosC);

                if(is_array($resultado) && $resultado["libreta"] == $_POST["libreta"] && $resultado["clave"] == $_POST["clave"])
                {
                    $_SESSION["Ingresar"] == true;

                    echo '<script>
                        window.location = "inicio";
                        </script>';
                }else{
                    echo '<br> <div class="alert-danger">Error al ingresar</div>';
                }
            }
        }
    }
}