<?php
if ($_SESSION["rol"] != "Administrador") {
    echo '<script> window.location = "inicio"; </script>';
    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <?php
        $exp = explode("/", $_GET["url"]);
        $valor = $exp[1];
        $columna = "id";
        $carrera = CareersC::ViewCareersC($columna, $valor);
        echo '<h1>Gesto de Exámenes de la carrera: ' . $carrera["nombre"] . '</h1>';
        ?>

        <br>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $materias = CoursesC::ViewCoursesC();
                    foreach ($materias as $key => $value) {
                        if ($value["id_carrera"] == $exp[1]) {


                            echo '  <tr>
                            <td>' . $value["codigo"] . '</td>
                            <td>' . $value["nombre"] . '</td>
                            <td>' . $value["grado"] . '</td>
                            <td>' . $value["tipo"] . '</td>
                            <td>
                                <div class="btn-group">
												<a href="http://localhost/project-01/C-E/' . $value["id_carrera"] . '/' . $value["id"] . '">
													<button class="btn btn-primary">Crear Examen</button>
												</a>
                                </div>
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
