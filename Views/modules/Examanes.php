<?php
if ($_SESSION["rol"] != "Administrador") {
    echo '<script> window.location = "inicio"; </script>';
    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gesto de Exámenes</h1>
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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $carrera = CareersC::ViewCareersC();
                    foreach ($carrera as $key => $value) {
                        echo '  <tr>
                            <td>' . $value["id"] . '</td>
                            <td>' . $value["nombre"] . '</td>
                            <td>
                                <div class="btn-group">';
                        if ($value["id"] == 0) {
                            echo ' <a href="#">
                                        <button class="btn btn-success" disabled readonly="">Ver Exámenes</button>
                                    </a>


                                    <a href="#">
                                        <button class="btn btn-warning" disabled readonly="">Crear exámenes</button>
                                    </a>';
                        } else {


                            echo ' <a href="Ver-Examenes/' . $value["id"] . '">
                                        <button class="btn btn-success">Ver Exámenes</button>
                                    </a>


                                    <a href="Crear-Examenes/' . $value["id"] . '">
                                        <button class="btn btn-warning">Crear exámenes</button>
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
