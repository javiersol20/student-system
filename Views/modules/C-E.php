<?php
if ($_SESSION["rol"] != "Administrador") {
    echo '<script> window.location = "inicio"; </script>';
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
                    $materia = CoursesC::ViewCoursesC($columna, $valor);
                    echo '<h2>Crear una fecha de examen para: <strong>' . $materia["nombre"] . '</strong></h2>
                    <input type="hidden" name="id_materia" value="' . $exp[2] . '">
                    <input type="hidden" name="estado" value="1">
                    <input type="hidden" name="id_carrera" value="' . $exp[1] . '">';
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Fecha:</h2>
                            <input type="date" name="fecha" class="input-lg">

                            <h2>Hora:</h2>
                            <input type="text" name="hora" class="input-lg">
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <h2>Profesor:</h2>
                            <input type="text" name="profesor" class="input-lg">

                            <h2>Aula:</h2>
                            <input type="text" name="aula" class="input-lg">
                            <br><br>
                            <button type="submit" class="btn btn-primary btn-lg">Crear examen</button>
                        </div>
                    </div>
                    <?php
                    $crearE = new ExamsC();
                    $crearE->CreateExamC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>
