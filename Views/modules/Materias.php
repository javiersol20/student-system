<div class="content-wrapper">
    <section class="content-header">
        <?php
        $columna = "id";
        $valor = $_SESSION["id_carrera"];
        $carrera = CareersC::ViewCareersC($columna,$valor);
        echo '<h1>Materias de la carrera: '.$carrera["nombre"].'</h1>';
        ?>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php
                $columna = "id";
                $valor = 1;
                $ajustes = SettingsC::ViewSettingC($columna, $valor);
                if($ajustes["h_materias"] != 0)
                {
                    echo ' <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                    $columna = "id_alumno";
                    $valor = $_SESSION["id"];
                    $notas = CoursesC::ViewNotesC($columna,$valor);

                    foreach ($notas as $key => $N) {
                        if($N["estado"] != "Aprobado" && $N["estado"] != "Regular")
                        {
                            $columna = "id";
                            $valor = $N["id_materia"];
                            $resultado = CoursesC::ViewCoursesC($columna,$valor);

                            if($ajustes["semestre"] != "2do semestre")
                            {
                                if($resultado["tipo"] != "2do semestre")
                                {
                                    echo' <tr>
                            <td>'.$resultado["codigo"].'</td>
                            <td>'.$resultado["nombre"].'</td>
                            <td>'.$resultado["grado"].'</td>
                            <td>'.$resultado["tipo"].'</td>
                            <td>
                                <a href="http://localhost/project-01/insc-materia/'.$_SESSION["id_carrera"].'/'.$resultado["id"].'">
                                    <button class="btn btn-primary">Ver detalles</button>
                                </a>
                            </td>
                        </tr>';
                                }
                            }else
                            {
                                if($resultado["tipo"] == "2do Semestre")
                                {
                                    echo' <tr>
                            <td>'.$resultado["codigo"].'</td>
                            <td>'.$resultado["nombre"].'</td>
                            <td>'.$resultado["grado"].'</td>
                            <td>'.$resultado["tipo"].'</td>
                            <td>
                                <a href="http://localhost/project-01/insc-materia/'.$_SESSION["id_carrera"].'/'.$resultado["id"].'">
                                    <button class="btn btn-primary">Ver detalles</button>
                                </a>
                            </td>
                        </tr>';
                                }
                            }
                        }
                    }

                   echo '</tbody>
                </table>';
                }else{
                    echo '<div class="alert alert-warning">Aún no estan disponibles las fechas de inscripciones...</div>';
                }
                ?>

            </div>
        </div>
    </section>
</div>