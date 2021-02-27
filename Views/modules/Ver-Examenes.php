<div class="content-wrapper">

    <section class="content-header">

        <?php

        $exp = explode("/", $_GET["url"]);

        $columna = "id";
        $valor = $exp[1];

        $carrera = CareersC::ViewCareersC($columna, $valor);

        echo '<h1>Exámenes de la Carrera: ' . $carrera["nombre"] . '</h1>';

        ?>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php

                $columna = "id";
                $valor = 1;

                $ajustes = SettingsC::ViewSettingC($columna, $valor);

                if ($ajustes["h_examenes"] != 0) {

                    echo '

					<table class="table table-bordered table-striped table-hover">

						<thead>

							<tr>

								<th>Materia</th>
								<th>Fecha</th>';

                    if ($_SESSION["rol"] == "Administrador") {

                        echo '<th>Profesor</th>
								<th>Hora</th>
								<th>Aula</th>';

                    }

                    echo '<th></th>

							</tr>

						</thead>

						<tbody>';

                    $columna = null;
                    $valor = null;

                    $resultado = ExamsC::ViewExamnsC($columna, $valor);

                    foreach ($resultado as $key => $value) {

                        if ($value["id_carrera"] == $exp[1]) {

                            if ($_SESSION["rol"] == "Estudiante" && $value["estado"] == 1) {

                                echo '<tr>';

                                $columna = "id";
                                $valor = $value["id_materia"];

                                $materia = CoursesC::ViewCoursesC($columna, $valor);

                                if ($value["id_materia"] == $materia["id"]) {

                                    echo '<td>' . $materia["nombre"] . '</td>';

                                }

                                echo '<td>' . $value["fecha"] . '</td>';


                                echo '<td>

										<div class="btn-group">';

                                if ($_SESSION["rol"] == "Estudiante") {

                                    echo '<a href="http://localhost/project-01/insc-examen/' . $_SESSION["id_carrera"] . '/' . $value["id"] . '">

										<button class="btn btn-primary">Ver Detalles</button>

										</a>';

                                }


                                echo '</div>

									</td>


									</tr>';

                            } else if ($_SESSION["rol"] == "Administrador") {

                                echo '<tr>';

                                $columna = "id";
                                $valor = $value["id_materia"];

                                $materia = CoursesC::ViewCoursesC($columna, $valor);

                                if ($value["id_materia"] == $materia["id"]) {

                                    echo '<td>' . $materia["nombre"] . '</td>';

                                }

                                echo '<td>' . $value["fecha"] . '</td>';

                                if ($_SESSION["rol"] == "Administrador") {

                                    echo '<td>' . $value["profesor"] . '</td>
										<td>' . $value["hora"] . '</td>
										<td>' . $value["aula"] . '</td>';

                                }

                                echo '<td>

										<div class="btn-group">';


                                if ($_SESSION["rol"] == "Administrador") {

                                    echo '<a href="http://localhost/project-01/Inscriptos-examen/' . $value["id"] . '">

										<button class="btn btn-primary">Ver Inscriptos</button>

										</a>';

                                    if ($value["estado"] == 1) {

                                        echo '<a href="http://localhost/project-01/">

												<button class="btn btn-warning">Deshabilitar</button>

												</a>';

                                    } else {

                                        echo '<a href="http://localhost/project-01/">

												<button class="btn btn-success">Habilitar</button>

												</a>';

                                    }

                                    echo '<a href="http://localhost/project-01/">

										<button class="btn btn-danger">Borrar</button>

										</a>';

                                }

                                echo '</div>

									</td>


									</tr>';

                            }

                        }

                    }


                    echo '</tbody>

					</table>';

                } else {

                    echo '<div class="alert alert-warning">Aún no están Habilitadas las fechas de Inscripciones.</div>';

                }

                ?>

            </div>

        </div>

    </section>

</div>