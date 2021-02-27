<?php

if ($_SESSION["rol"] != "Administrador") {

    echo '<script>

	window.locations = "inicio";
	</script>';

    return;

}

?>


<div class="content-wrapper">

    <section class="content">

        <div class="box">

            <div class="box-body">

                <h1>Certificados</h1>


                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <h2>Solicitudes:</h2>

                        <table class="table table-bordered table-hover table-striped">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Estudiante</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $columna = null;
                            $valor = null;

                            $resultado = CertificatesC::ViewCertificateC($columna, $valor);

                            foreach ($resultado as $key => $value) {

                                if ($value["estado"] == "No Impreso") {

                                    echo '<tr>

											<td>' . ($key + 1) . '</td>';

                                    $columna = "id";
                                    $valor = $value["id_alumno"];

                                    $alumno = UsersC::GetUsersC($columna, $valor);

                                    echo '<td>' . $alumno["apellido"] . ', ' . $alumno["nombre"] . '</td>

											<td>' . $value["tipo"] . '</td>
											<td>' . $value["estado"] . '</td>';

                                    if ($value["tipo"] == "alumno") {

                                        echo '<td>

												<a href="http://localhost/project-01/tcpdf/pdf/C-Alumno.php/' . $alumno["id"] . '">
													<button class="btn btn-primary">Descargar PDF</button>
												</a>

												</td>

											<td>

											<form method="post">

												<input type="hidden" name="estado" value="Impreso">

												<input type="hidden" name="Eid" value="' . $value["id"] . '">

												<button class="btn btn-success" type="submit">Listo</button>

											</form>

											</td>';

                                    } else {

                                        echo '<td>

												<a href="http://localhost/project-01/tcpdf/pdf/C-Materias.php/' . $alumno["id"] . '">
													<button class="btn btn-primary">Descargar PDF</button>
												</a>

												</td>

											<td>

											<form method="post">

												<input type="hidden" name="estado" value="Impreso">

												<input type="hidden" name="Eid" value="' . $value["id"] . '">

												<button class="btn btn-success" type="submit">Listo</button>

											</form>

											</td>';

                                    }

                                    echo '

										</tr>';

                                }

                            }

                            ?>
                            </tbody>

                        </table>


                        <h2>Solicitudes Listas:</h2>

                        <table class="table table-bordered table-hover table-striped">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Estudiante</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            $columna = null;
                            $valor = null;

                            $resultado = CertificatesC::ViewCertificateC($columna, $valor);

                            foreach ($resultado as $key => $value) {

                                if ($value["estado"] == "Impreso") {

                                    echo '<tr>

											<td>' . ($key + 1) . '</td>';

                                    $columna = "id";
                                    $valor = $value["id_alumno"];

                                    $alumno = UsersC::GetUsersC($columna, $valor);

                                    echo '<td>' . $alumno["apellido"] . ', ' . $alumno["nombre"] . '</td>

											<td>' . $value["tipo"] . '</td>
											<td>' . $value["estado"] . '</td>';

                                    if ($value["tipo"] == "alumno") {

                                        echo '<td>

												<a href="http://localhost/project-01/tcpdf/pdf/C-Alumno.php/' . $alumno["id"] . '">
													<button class="btn btn-primary">Descargar PDF</button>
												</a>

												</td>

											';

                                    } else {

                                        echo '<td>

												<a href="http://localhost/project-01/tcpdf/pdf/C-Materias.php/' . $alumno["id"] . '">
													<button class="btn btn-primary">Descargar PDF</button>
												</a>

												</td>

											';

                                    }

                                    echo '

										</tr>';

                                }

                            }

                            ?>
                            </tbody>

                            <?php

                            $estado = new CertificatesC();
                            $estado->UpdateStatusC();

                            ?>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>