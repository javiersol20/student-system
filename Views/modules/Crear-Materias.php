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
        <?php

        $exp = explode("/",$_GET["url"]);
        $columnaC = "id";
        $valorC = $exp[1];
        $respuesta = CareersC::ViewCareersC($columnaC,$valorC);
        echo '<h1>Gestor de materias de la carrera: '.$respuesta["nombre"].'</h1>';

        ?>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearMateria">Crear materia</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped T">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th>Programa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    $verCursos = CoursesC::ViewCoursesC();

                    foreach ($verCursos as $key => $value)
                    {
                        if($value["id_carrera"] == $exp[1])
                        {
                            echo ' <tr>
                            <td>'.$value["codigo"].'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["grado"].'</td>
                            <td>'.$value["tipo"].'</td>';
                            if($value["programa"] != "")
                            {

                                echo '<td><a href="http://localhost/project-01/'.$value["programa"].'" download="'.$value["nombre"].'">Descargar</a></td>';
                            }else{
                                echo '<td><a href="#"></a>No hay programa</td>';

                            }

                            echo '<td>
                                <div class="btn-group">
                                    <a href="http://localhost/project-01/Crear-Comisiones/'.$value["id"].'">
                                        <button class="btn btn-defaul">Comisiones</button>
                                    </a>
                                    <a href="http://localhost/project-01/index.php?url=Crear-Materias/'.$exp[1].'&Mid='.$value["id"].'&Cid='.$exp[1].'">
                                        <button class="btn btn-danger " Mid="'.$value["id"].'" Cid="'.$exp[1].'">Eliminar</button>
                                    </a>
                                </div>
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
<?php
    $eliminarM = new CoursesC();
    $eliminarM ->DeleteCoursesC();
?>
<div class="modal fade" id="CrearMateria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <h2>Código: </h2>
                        <input type="text" name="codigo" class="form-control input-lg" required>
                        <?php echo '<input type="hidden" name="Cid" value="'.$respuesta["id"].'">' ?>

                    </div>

                    <div class="form-group">
                        <h2>Nombre: </h2>
                        <input type="text" name="nombre" class="form-control input-lg" required>

                    </div>

                    <div class="form-group">
                        <h2>Grado: </h2>
                        <input type="text" name="grado" class="form-control input-lg" required>

                    </div>

                    <div class="form-group">
                        <h2>Tipo:</h2>
                        <select name="tipo" id="" class="form-control input-lg" required>
                            <option value="#">Seleccionar</option>
                            <option value="Anual">Anual</option>
                            <option value="1er semestre">1er semestre</option>
                            <option value="2do semestre">2do semestre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <h2>Programa: </h2>
                        <input type="file" name="programa" class="form-control input-lg" >

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>

                </div>
                <?php
                    $crearM = new CoursesC();
                    $crearM->CreateCourseC();
                ?>
            </form>
        </div>
    </div>
</div>