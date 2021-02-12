<?php

if($_SESSION["rol"] != "Administrador"){

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

                            <input type="text" name="carrera" class="form-control" placeholder="Ingresar Nueva Carrera" required>

                        </div>

                        <button type="submit" class="btn btn-primary">Crear Carrera</button>

                    </form>

                    <?php

                    $crearCarrera = new CareersC();
                    $crearCarrera -> CreateCareersC();

                    ?>

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
							
									<td>'.$value["id"].'</td>
									<td>'.$value["nombre"].'</td>

									<td>
										
										<div class="btn-group">
											
											<a href="Editar-Carrera/'.$value["id"].'">
												<button class="btn btn-success">Editar</button>
											</a>

											<a href="Carreras/'.$value["id"].'">
												<button class="btn btn-danger">Borrar</button>
											</a>

											<a href="#">
												<button class="btn btn-warning">Materias</button>
											</a>

											<a href="#">
												<button class="btn btn-primary">Estudiantes</button>
											</a>

										</div>

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

<?php

$borrarCarrera = new CareersC();
$borrarCarrera -> DeleteCareersC();