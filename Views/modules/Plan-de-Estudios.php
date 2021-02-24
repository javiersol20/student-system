<div class="content-wrapper">
    <section class="content-header">
        <?php
        $columnaC = "id";
        $valorC = $_SESSION["id_carrera"];

        $carrera = CareersC::ViewCareersC($columnaC,$valorC);
        echo '<h1>Plan de estudios: '.$carrera["nombre"].'</h1>';
        ?>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th>Programa</th>
                            <th>Nota</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $resultado = CoursesC::ViewCoursesC();
                    foreach ($resultado as $key => $value)
                    {
                        if($value["id_carrera"] == $_SESSION["id_carrera"])
                        {
                            echo '<tr>
                            <td>'.$value["codigo"].'</td>
                            <td>'.$value["nombre"].' </td>
                            <td>'.$value["grado"].'</td>
                            <td>'.$value["tipo"].'</td>';
                            if($value["programa"] != "")
                            {
                                echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'">Descargar</a></td>';
                            }else{
                                echo '<td>no tiene programa</td>';
                            }
                            $columna = "id_materia";
                            $valor = $value["id"];
                            $nota = CoursesC::ViewNotesC($columna,$valor);
                            foreach ($nota as $key => $N)
                            {

                                if($N["id_alumno"] == $_SESSION["id"] && $N["id_materia"] == $value["id"])
                                {
                                    if($N["estado"] == "Aprobado")
                                    {
                                        echo '<td class="bg-primary">'.$N["nota_final"].'</td>
                                                <td class="bg-primary">'.$N["estado"].'</td>';
                                    }elseif ($N["estado"] == "Regular")
                                    {
                                        echo '<td class="bg-success">'.$N["nota_final"].'</td>
                                                <td class="bg-success">'.$N["estado"].'</td>';
                                    }elseif ($N["estado"] == "Desaprobado")
                                    {
                                        echo '<td class="bg-warning">'.$N["nota_final"].'</td>
                                                <td class="bg-warning">'.$N["estado"].'</td>';
                                    }elseif ($N["estado"] == "No cursado"){
                                        echo '<td class="bg-red">'.$N["nota_final"].'</td>
                                                <td class="bg-red">'.$N["estado"].'</td>';
                                    }
                                }else{
                                    echo "no";
                                }

                            }
                            echo '
                         
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