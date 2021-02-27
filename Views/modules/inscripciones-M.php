<?php
error_reporting(0);
$exp = explode("/", $_GET["url"]);
if ($_SESSION["id_carrera"] != $exp[1]) {
    echo '<script>
            window.location = "http://localhost/project-01/inicio";
        </script>';
    return;
}

?>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">

                <?php
                $exp = explode("/", $_GET["url"]);
                $columna = "id";
                $valor = $exp[2];
                $materia = CoursesC::ViewCoursesC($columna, $valor);
                echo '<h2>Materia: ' . $materia["nombre"] . '</h2>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Código: ' . $materia["codigo"] . '</h2>
                            <h2>Grado: ' . $materia["grado"] . '</h2>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <h2>Tipo: ' . $materia["tipo"] . '</h2>';

                $columna = "id_materia";
                $valor = $exp[2];
                $row = "Null";
                $insC = CoursesC::SeeQuotaC($columna, $valor, $row);

                foreach ($insC as $key => $C) {
                    if ($C["id_alumno"] == $_SESSION["id"]) {
                        $columna = "id";
                        $valor = $C["id_comision"];
                        $row = 1;
                        $comision = CoursesC::ViewCommissionsC($columna, $valor, $row);
                        if (is_array($comision)) {
                            echo '<h2>Tú Comision:</h2> <h3>' . $comision["dias"] . ' - ' . $comision["horario"] . '</h3>';

                        }

                        echo '                    <br><br><br>
                    <div class="alert alert-success">Usted ya está inscrito a esta materia...</div>
                    <a href="http://localhost/project-01/inscripciones-M/' . $exp[1] . '/' . $exp[2] . '/' . $C["id"] . '">
                        <button type="submit" class="btn btn-danger">Dar de baja</button>

                    </a>';
                    }
                }

                ?>


            </div>
        </div>

</div>
</div>
</section>
</div>

<?php
$remove = new CoursesC();
$remove->RemoveRegistrationC();
?>













