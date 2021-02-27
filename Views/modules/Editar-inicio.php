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

                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <?php

                        $columna = "id";
                        $valor = 1;

                        $resultado = SettingsC::ViewSettingC($columna, $valor);

                        echo '<h2>Semestre Actual: ' . $resultado["semestre"] . '</h2>

							<form method="post">
								
								<button type="submit" class="btn btn-primary">1er Semestre</button>

								<input type="hidden" name="semestreA" value="1er semestre">';
                        $semestre = new SettingsC();
                        $semestre->ChangeSemesterC();

                        echo '</form>

							<br>

							<form method="post">
								
								<button type="submit" class="btn btn-success">2do Semestre</button>

								<input type="hidden" name="semestreA" value="2do semestre">';

                        $semestre = new SettingsC();
                        $semestre->ChangeSemesterC();
                        echo '</form>

							<br>

							<form method="post">
								
								<h2>1er Semestre</h2>

								<h3>Inicio: <input type="date" class="input-lg" name="1_fecha_inicio" value="' . $resultado["1_fecha_inicio"] . '"></h3>

								<h3>Fin: <input type="date" class="input-lg" name="1_fecha_fin" value="' . $resultado["1_fecha_fin"] . '"></h3>

								<br>

								<h2>2do Semestre</h2>

								<h3>Inicio: <input type="date" class="input-lg" name="2_fecha_inicio" value="' . $resultado["2_fecha_inicio"] . '"></h3>

								<h3>Fin: <input type="date" class="input-lg" name="2_fecha_fin" value="' . $resultado["2_fecha_fin"] . '"></h3>


						</div>

						<div class="col-xs-12 col-md-6">
							
							<br>

							<h2>Fechas de Exámenes Próximas:</h2>

							<h3>Desde: <input type="date" class="input-lg" name="examenes_i" value="' . $resultado["examenes_i"] . '"></"></h3>

							<h3>Hasta: <input type="date" class="input-lg" name="examenes_f" value="' . $resultado["examenes_f"] . '"></"></h3>

							<br>

							<h2>Fechas para Inscribirse a Materias:</h2>

							<h3>Desde: <input type="date" class="input-lg" name="materias_i" value="' . $resultado["materias_i"] . '"></"></h3>

							<h3>Hasta: <input type="date" class="input-lg" name="materias_f" value="' . $resultado["materias_f"] . '"></"></h3>

						</div>
						
						

					<br>

					<button type="submit" class="btn btn-success btn-lg">Guardar Cambios</button>';

                        $guardarAjustes = new SettingsC();
                        $guardarAjustes->UpdateSettingsC();
                        ?>

                        </form>

                    </div>

                </div>

            </div>

    </section>

</div>