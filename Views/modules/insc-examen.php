<?php

$exp = explode("/", $_GET["url"]);

if($_SESSION["id_carrera"] != $exp[1]){

    echo '<script>

	window.locations = "http://localhost/project-01/inicio";
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

                    $columna = "id";
                    $valor = $exp[2];

                    $resultado = ExamsC::ViewExamnsC($columna, $valor);

                    $columna = "id";
                    $valor = $resultado["id_materia"];

                    $materia = CoursesC::ViewCoursesC($columna, $valor);

                    echo '<h2>Inscribirse a la Mesa de Exámen para: <br><br>'.$materia["nombre"].'</h2>

						<input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
						<input type="hidden" name="id_carrera" value="'.$_SESSION["id_carrera"].'">
						<input type="hidden" name="libreta" value="'.$_SESSION["libreta"].'">
						<input type="hidden" name="id_examen" value="'.$resultado["id"].'">

						<div class="row">

							<div class="col-md-6 col-xs-12">

								<h2>Fecha: '.$resultado["fecha"].'</h2>
								<h2>Hora: '.$resultado["hora"].'</h2>

							</div>

							<div class="col-md-6 col-xs-12">

								<h2>Profesor: '.$resultado["profesor"].'</h2>
								<h2>Aula: '.$resultado["aula"].'</h2>

								<br><br>

								<button type="submit" class="btn btn-primary btn-lg">Inscribirse</button>

							</div>

						</div>
						';

                    $Iexamen = new ExamsC();
                    $Iexamen -> RegisterExamC();

                    ?>

                </form>

            </div>

        </div>

    </section>

</div>
