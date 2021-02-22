<?php
if($_SESSION["rol"] != "Administrador")
{
    echo '<script> window.location = "http://localhost/project-01/inicio"; </script>';

    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php
        $exp = explode("/",$_GET["url"]);
        $columnaC = "id";
        $valorC = $exp[1];

        $carrera = CareersC::ViewCareersC($columnaC,$valorC);
        echo '<h1>Estudiantes de: ' .$carrera["nombre"].'</h1>';
        ?>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Libreta</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $columna = "null";
                    $valor = "null";
                    $users = UsersC::GetUsersC($columna, $valor);

                    foreach ($users as $key => $value) {
                        if($value["id_carrera"] == $exp[1])
                        {
                            echo '<tr>
                            <td>'.$value["libreta"].'</td>
                            <td>'.$value["apellido"].'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>
                                <a href="http://localhost/project-01/Ver-Plan/'.$value["id_carrera"].'/'.$value["libreta"].'">
                                    <button class="btn btn-primary">Plan de Estudios</button>
                                </a>
                            </td>
                        </tr>';
                        }

                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>