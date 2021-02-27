<?php
error_reporting(0);

$exp = explode("/", $_GET["url"]);
if ($_SESSION["id_carrera"] != $exp[1]) {
    echo '<script>
            window.location = "http://localhost/project-01/inicio";
        </script>';
    return;
}
$columna = "id_materia";
$valor = $exp[2];
$row = "Null";
$ins = CoursesC::SeeQuotaC($columna, $valor, $row);
foreach ($ins as $key => $m) {
    if ($m["id_materia"] == $exp[2] && $m["id_alumno"] == $_SESSION["id"]) {
        echo '<script> window.location = "http://localhost/project-01/inscripciones-M/' . $exp[1] . '/' . $exp[2] . '"; </script>';
    }
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post">
                    <?php
                    $exp = explode("/", $_GET["url"]);
                    $columna = "id";
                    $valor = $exp[2];
                    $materia = CoursesC::ViewCoursesC($columna, $valor);
                    echo '<h2>Inscribirse a la materia: ' . $materia["nombre"] . '</h2>

                    <input type="hidden" name="id_alumno" value="' . $_SESSION["id"] . '">
                    <input type="hidden" name="id_carrera" value="' . $_SESSION["id_carrera"] . '">
                    <input type="hidden" name="id_materia" value="' . $materia["id"] . '">
                    
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Código: ' . $materia["codigo"] . '</h2>
                            <h2>Grado: ' . $materia["grado"] . '</h2>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <h2>Tipo: ' . $materia["tipo"] . '</h2>
                            <p>Solo se podra inscribir a una comision por unica vez</p>';
                    $columna = "id_materia";
                    $valor = $exp[2];

                    $comisiones = CoursesC::ViewCommissionsC($columna, $valor);

                    foreach ($comisiones as $key => $value) {
                        $columna = "id_comision";
                        $valor = $value["id"];
                        $insc = CoursesC::SeeQuotaC($columna, $valor);
                        $contador = count($insc);

                        if (!empty($contador) && $contador < $value["c_maxima"]) {
                            $lugares = ($value["c_maxima"] - count($insc));
                            echo '<input type="radio" name="id_comision" required value="' . $value["id"] . '"> ' . $value["dias"] . ' - ' . $value["horario"] . ' - Lugares ' . $lugares . '<br>';

                        }


                    }
                    ?>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary">Inscribirse</button>
                    <?php
                    $inscribir = new CoursesC();
                    $inscribir->EnrollSubjectC();
                    ?>
            </div>
        </div>
        </form>
</div>
</div>
</section>
</div>















