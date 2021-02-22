<?php

if($_SESSION["rol"] != "Administrador")
{
    echo '<script>
            window.location = "Inicio";
        </script>';
    return;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php

        $exp = explode("/", $_GET["url"]);
        $columna = "libreta";
        $valor = $exp[2];

        $estudiante = UsersC::GetUsersC($columna,$valor);

        echo '<h1>Plan de estudios del estudiante: '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h1>';
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
                            <th>Nota</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $resultado = CoursesC::ViewCoursesC();
                        foreach ($resultado as $key => $value)
                        {
                            if($value["id_carrera"] == $estudiante["id_carrera"])
                            {


                            echo '   <tr>
                            <td>'.$value["codigo"].'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["grado"].'</td>
                            <td>'.$value["tipo"].'</td>';
                            $columna = "id_materia";
                            $valor = $value["id"];

                            $nota = CoursesC::ViewNotesC($columna,$valor);

                            foreach ($nota as $key => $N)
                            {

                                if($N["id_alumno"] == $estudiante["id"] && $N["id_materia"] == $value["id"])
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

                            echo '<td>
                                <a href="http://localhost/project-01/Nota-Materia/'.$exp[1].'/'.$exp[2].'/'.$value["id"].'">
                                    <button class="btn btn-success btn-sm fa-pull-left"><i class="fa fa-pencil"></i></button>
                                </a>
                            </td>
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