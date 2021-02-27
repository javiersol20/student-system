<?php

if ($_SESSION["rol"] != "Administrador") {

    echo '<script>

	window.locations = "inicio";
	</script>';

    return;

}

?>


    <div class="content-wrapper">

        <section class="content-header">

            <h1>Gestor de Carreras Universitarias</h1>

        </section>

        <section class="content">

            <div class="box">

                <div class="box-header">

                    <form method="post">

                        <div class="col-md-6 col-xs-12">

                            <input type="text" name="carrera" class="form-control" placeholder="Ingresar Nueva Carrera"
                                   required>

                        </div>

                        <button type="submit" class="btn btn-primary">Crear Carrera</button>

                    </form>

                    <?php

                    $crearCarrera = new CareersC();
                    $crearCarrera->CreateCareersC();

                    ?>
                    <br>
                    <?php

                    $columna = "id";
                    $valor = 1;

                    $resultado = SettingsC::ViewSettingC($columna, $valor);

                    if ($resultado["h_materias"] == 0) {
                        echo '<button class="btn btn-success" type="submit" data-toggle="modal" data-target="#HM">Habilitar Inscripciones a Materias</button>';

                    } else {
                        echo '<button class="btn btn-warning" type="submit" data-toggle="modal" data-target="#DM">Deshabilitar Inscripciones a Materias</button>';

                    }

                    ?>
                    <button class="btn btn-danger pull-right" type="submit" data-toggle="modal"
                            data-target="#VaciarRegistrosMaterias">Vaciar Registros de Inscripciones a las Materias
                    </button>

                </div>


                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped">

                        <thead>

                        <tr>

                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Acciones</th>

                        </tr>

                        </thead>

                        <tbody>

                        <?php

                        $resultado = CareersC::ViewCareersC();

                        foreach ($resultado as $key => $value) {

                            echo '<tr>
							
									<td>' . $value["id"] . '</td>
									<td>' . $value["nombre"] . '</td>

									<td>
										
										<div class="btn-group">
											
											<a href="Editar-Carrera/' . $value["id"] . '">
												<button class="btn btn-success">Editar</button>
											</a>

											<a href="Carreras/' . $value["id"] . '">
												<button class="btn btn-danger">Borrar</button>
											</a>';
                            if ($value["id"] == 0) {
                                echo '<a href="#">
												<button disabled readonly="" class="btn btn-warning">Materias</button>
											</a>
                                                <a href="#">
												<button disabled class="btn btn-primary">Estudiantes</button>
											    </a>';
                            } else {
                                echo '<a href="Crear-Materias/' . $value["id"] . '">
												<button class="btn btn-warning">Materias</button>
											</a>
                                                 <a href="Estudiantes/' . $value["id"] . '">
												<button class="btn btn-primary">Estudiantes</button>
											</a>';
                            }


                            echo '</div>

									</td>

								</tr>';

                        }

                        ?>


                        </tbody>

                    </table>

                </div>


            </div>

        </section>

    </div>

    <div class="modal fade" id="HM">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="post">

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h2>¿Está seguro que desea Habilitar las Inscripciones a las Materias?</h2>

                                <input type="hidden" name="h_materias" value="1">

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                    <?php

                    $habilitar = new SettingsC();
                    $habilitar->EnableCoursesC();

                    ?>

                </form>

            </div>

        </div>

    </div>


    <div class="modal fade" id="DM">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="post">

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h2>¿Está seguro que desea Deshabilitar las Inscripciones a las Materias?</h2>

                                <input type="hidden" name="h_materias" value="0">

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                    <?php

                    $inhabilitar = new SettingsC();
                    $inhabilitar->DisableCourseC();

                    ?>
                </form>

            </div>

        </div>

    </div>


    <div class="modal fade" id="VaciarRegistrosMaterias">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="post">

                    <div class="modal-body">

                        <div class="box-body">

                            <div class="form-group">

                                <h2>¿Está seguro que desea Eliminar todas las Inscripciones a las Materias?</h2>

                                <input type="hidden" name="E" value="E">

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Confirmar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                    </div>

                    <?php

                    $delete = new SettingsC();
                    $delete->DeleteCoursesC();

                    ?>

                </form>

            </div>

        </div>

    </div>

<?php

$borrarCarrera = new CareersC();
$borrarCarrera->DeleteCareersC();