<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>

	window.locations = "http://localhost/project-01/inicio";
	</script>';

    return;

}

?>


<div class="content-wrapper">

    <section class="content-header">

        <?php

        $exp = explode("/", $_GET["url"]);

        $columna = "id";
        $valor = $exp[1];

        $examen = ExamsC::ViewExamnsC($columna, $valor);

        $columna = "id";
        $valor = $examen["id_materia"];

        $materia = CoursesC::ViewCoursesC($columna, $valor);

        echo '<h1>Inscriptos para el Exámen de: '.$materia["nombre"].'<br><br>

		Fecha: '.$examen["fecha"].' - Hora: '.$examen["hora"].' - Aula: '.$examen["aula"].'
		</h1>
		<br>';

        echo '<a href="http://localhost/project-01/tcpdf/pdf/Inscriptos-Examen.php/'.$exp[1].'" target="blank">
				<button class="btn btn-primary">Generar PDF</button>
			</a>';

        ?>







    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Libreta</th>
                        <th>Apellido y Nombre</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php

                    $columna = "id_examen";
                    $valor = $exp[1];

                    $insc = ExamsC::ViewRegistersExamC($columna, $valor);

                    foreach ($insc as $key => $value) {

                        echo '<tr>

								<td>'.($key+1).'</td>
								<td>'.$value["libreta"].'</td>';

                        $columna = "id";
                        $valor = $value["id_alumno"];

                        $alumnos = UsersC::GetUsersC2($columna, $valor);

                        foreach ($alumnos as $key => $v) {

                            echo '<td>'.$v["apellido"].' '.$v["nombre"].'</td>

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

