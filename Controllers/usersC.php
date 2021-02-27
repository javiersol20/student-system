<?php


class UsersC
{
    public function Login()
    {
        if (isset($_POST["libreta"])) {
            if (empty($_POST["libreta"])) {
                echo '<br> <div class="alert-danger">La libreta no puede ir vacio</div>';
            } elseif (empty($_POST["clave"])) {
                echo '<br> <div class="alert-danger">La contraseña no puede ir vacia</div>';

            } else {

                # Evitar sql inyection
                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["libreta"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])) {
                    $tablaBD = "usuarios";

                    $datosC = ["libreta" => $_POST["libreta"], "clave" => $_POST["clave"]];

                    $resultado = UsersM::LoginM($tablaBD, $datosC);

                    if (is_array($resultado) && $resultado["libreta"] == $_POST["libreta"] && $resultado["clave"] == $_POST["clave"]) {
                        $_SESSION["Ingresar"] = true;
                        $_SESSION["id"] = $resultado["id"];
                        $_SESSION["id_carrera"] = $resultado["id_carrera"];
                        $_SESSION["libreta"] = $resultado["libreta"];
                        $_SESSION["nombre"] = $resultado["nombre"];
                        $_SESSION["apellido"] = $resultado["apellido"];
                        $_SESSION["rol"] = $resultado["rol"];

                        echo '<script>
                        window.location = "inicio";
                        </script>';
                    } else {
                        echo '<br> <div class="alert-danger">Error al ingresar</div>';
                    }
                } else {
                    echo '<br> <div class="alert-danger">No se admiten caracteres especiales</div>';
                }
            }
        }
    }

    public function GetMyDataC()
    {
        $tablaDB = "usuarios";
        $id = $_SESSION["id"];
        $respuesta = UsersM::GetMyDataM($tablaDB, $id);
        echo '            <form method="post">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h2>Fecha de Nacimiento: </h2>
                        <input type="date" class="input-lg" name="fechanac" value="' . $respuesta["fechanac"] . '">
                        <input type="hidden" name="idU" value="' . $_SESSION["id"] . '">
                        
                        <h2>Dirección: </h2>
                        <input type="text" class="input-lg" name="direccion" value="' . $respuesta["direccion"] . '">
                        
                        <h2>Teléfono: </h2>
                        <input type="number" class="input-lg" name="telefono" value="' . $respuesta["telefono"] . '">

                        <h2>Contraseña: </h2>
                        <input type="password" class="input-lg" name="clave" value="' . $respuesta["clave"] . '">

                    </div>

                    <div class="col-md-6 col-xs-12">
                        <h2>Correo Electrónico: </h2>
                        <input type="email" class="input-lg" class="input-lg" name="correo" value="' . $respuesta["correo"] . '" >

                        <h2>Preparatoria: </h2>
                        <input type="text" class="input-lg" name="preparatoria"  value="' . $respuesta["preparatoria"] . '" >

                        <h2>País: </h2>
                        <input type="text" class="input-lg" name="pais"  value="' . $respuesta["pais"] . '" >
                        <br><br>
                        <button type="submit" class="btn btn-success">Guardar datos</button>
                    </div>
                </div>
            </form>';

    }

    public function EditDataC()
    {
        if (isset($_POST["idU"]) && !empty($_POST["idU"])) {
            $tablaBD = "usuarios";
            $id = $_POST["idU"];
            $datosC = [
                "id" => $_POST["idU"],
                "fechanac" => $_POST["fechanac"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "clave" => $_POST["clave"],
                "correo" => $_POST["correo"],
                "preparatoria" => $_POST["preparatoria"],
                "pais" => $_POST["pais"]
            ];
            $respuesta = UsersM::EditDataM($tablaBD, $datosC);
            if ($respuesta == true) {
                echo '<script>
                        window.location = "mi-perfil";
                    </script>';
            }
        }
    }

    public function CreateUserC()
    {
        if (isset($_POST["create"])) {
            if (isset($_POST["apellidoU"]) && !empty($_POST["apellidoU"]) && isset($_POST["nombreU"]) && !empty($_POST["nombreU"]) && isset($_POST["usuarioU"]) && !empty($_POST["usuarioU"])
                && isset($_POST["carreraU"]) && isset($_POST["rolU"]) && !empty($_POST["rolU"])) {


                $tablaBD = "usuarios";

                $datosC = array("apellido" => $_POST["apellidoU"], "nombre" => $_POST["nombreU"], "libreta" => $_POST["usuarioU"], "clave" => $_POST["claveU"], "id_carrera" => $_POST["carreraU"], "rol" => $_POST["rolU"]);

                $resultado = UsersM::CreateUserM($tablaBD, $datosC);

                if ($resultado == true) {

                    echo '<script>

				window.location = "http://localhost/project-01/Users";
				</script>';

                }

            } else {
                echo '<script>

				alert("Todos los campos deben ir llenos, excepto el campo carrera que es opcional");
				</script>';

            }
        }
    }

    static public function GetUsersC($columna, $valor)
    {
        $tablaBD1 = "usuarios";
        $tablaBD2 = "carreras";
        $respuesta = UsersM::GetUsersM($tablaBD1, $tablaBD2, $columna, $valor);
        return $respuesta;
    }
    static public function GetUsersC2($columna,$valor)
    {
        $tablaBD1 = "usuarios";
        $respuesta = UsersM::GetUsersM2($tablaBD1, $columna, $valor);
        return $respuesta;
    }

    public function UpdateUserC()
    {
        if (isset($_POST["update"])) {
            if (isset($_POST["apellidoUE"]) && !empty($_POST["apellidoUE"]) && isset($_POST["nombreUE"]) && !empty($_POST["nombreUE"]) && isset($_POST["usuarioUE"]) && !empty($_POST["usuarioUE"])
                && isset($_POST["rolUE"]) && !empty($_POST["rolUE"])) {
                $tablaBD = "usuarios";
                $datosC = [
                    "id" => $_POST["Uid"],
                    "apellido" => $_POST["apellidoUE"],
                    "nombre" => $_POST["nombreUE"],
                    "libreta" => $_POST["usuarioUE"],
                    "clave" => $_POST["claveUE"],
                    "id_carrera" => $_POST["carreraUE"],
                    "rol" => $_POST["rolUE"]
                ];
                $respuesta = UsersM::UpdateUserM($tablaBD, $datosC);
                if ($respuesta == true) {
                    echo '<script> window.location = "Users"; </script>';

                } else {
                    echo "<script> alert('Ha ocurrido un error!'); </script>";

                }
            } else {
                echo "<script> alert('Todos los campos son obligatorios'); </script>";
            }
        }
    }

    public function DeleteUserC()
    {
        if (isset($_GET["Uid"])) {
            $tablaBD = "usuarios";
            $id = $_GET["Uid"];
            $respuesta = UsersM::DeleteUserC($tablaBD, $id);

            if ($respuesta == true) {
                echo "<script> window.location = 'Users'; </script>";
            } else {
                echo "<script> alert('Ups! Algo salio mal en eliminar'); </script>";
            }
        }
    }
}











