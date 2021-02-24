<?php
$exp = explode("/", $_GET["url"]);
if($_SESSION["id_carrera"] != $exp[1])
{
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
                <form method="post">
                    <?php
                    $exp = explode("/", $_GET["url"]);
                    $columna = "id";
                    $valor = $exp[2];
                    $materia = CoursesC::ViewCoursesC($columna,$valor);
                    echo '<h2>Inscribirse a la materia: '.$materia["nombre"].'</h2>

                    <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
                    <input type="hidden" name="id_carrera" value="'.$_SESSION["id_carrera"].'">
                    <input type="hidden" name="id_materia" value="'.$materia["id"].'">
                    
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Código: '.$materia["codigo"].'</h2>
                            <h2>Grado: '.$materia["grado"].'</h2>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <h2>Tipo: '.$materia["tipo"].'</h2>';

                    $columna = "id_materia";
                    $valor = $exp[2];
                    $row = 1;
                    $insC = CoursesC::SeeQuotaC($columna,$valor,$row);

                    $columna = "id";
                    $valor = $insC["id_comision"];
                    $row = 1;
                    $comision = CoursesC::ViewCommissionsC($columna,$valor,$row);
                    echo '<h2>Tú Comision:</h2> <h3>'.$comision["dias"].' - '.$comision["horario"].'</h3>';
                    ?>
                    <br><br><br>
                    <div class="alert alert-success">Usted ya está inscrito a esta materia...</div>
                    <button type="submit" class="btn btn-danger">Dar de baja</button>
                    <?php

                    ?>
            </div>
        </div>
        </form>
</div>
</div>
</section>
</div>















