<?php
$exp = explode("/", $_GET["url"]);
$columna = "id_materia";
$valor = $exp[3];

$nota = CoursesC::ViewNotesC($columna, $valor);

if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
            window.location = "Inicio";
        </script>';
    return;
}
foreach ($nota as $Key => $EN) {
    if ($EN["id_materia"] == $exp[3] && $EN["libreta"] == $exp[2]) {
        echo '<script>
            window.location = "http://localhost/project-01/Editar-Nota/' . $exp[3] . '/' . $exp[2] . '/' . $EN["id"] . '";
            </script>';
        return;
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
                    $columna = "libreta";
                    $valor = $exp[2];
                    $estudiante = UsersC::GetUsersC($columna, $valor);
                    echo '<h2>Alumno: ' . $estudiante["nombre"] . ' - Libreta: ' . $estudiante["libreta"] . '</h2>';
                    echo '<input type="hidden" name="id_alumno" value="' . $estudiante["id"] . '">';
                    echo '<input type="hidden" name="libreta" value="' . $estudiante["libreta"] . '">';
                    echo '<input type="hidden" name="id_carrera" value="' . $exp[1] . '">';
                    $columna = "id";
                    $valor = $exp[3];
                    $materia = CoursesC::ViewCoursesC($columna, $valor);
                    echo '<h2>Materia: ' . $materia["nombre"] . '</h2>';
                    echo '<input type="hidden" name="id_materia" value="' . $materia["id"] . '">';
                    ?>

                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <h2>Fecha:</h2>
                            <input type="date" name="fecha" class="input-lg">
                            <h2>Profesor:</h2>
                            <input type="text" name="profesor" id="" class="input-lg">
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <h2>Nota final:</h2>
                            <input type="number" name="nota_final" id="" class="input-lg">
                            <br><br>
                            <button type="submit" class="btn btn-success btn-lg">Guardar Nota</button>
                        </div>

                    </div>
                    <?php
                    $notas = new CoursesC();
                    $notas->AddNoteC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>