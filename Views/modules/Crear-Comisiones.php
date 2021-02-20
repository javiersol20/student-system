<?php
if($_SESSION["rol"] != "Administrador")
{
    echo '<script>
                window.location = "inicio";
          </script>';
    return;
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php
                $exp = explode("/", $_GET["url"]);
                $columna = "id";
                $valor = $exp[1];
                $materia = CoursesC::ViewCoursesC($columna,$valor);

                echo '<h2>Comisiones de la Materia: </h2>
                <h1><b>'.$materia["nombre"].'</b></h1>';
                ?>


                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearComision">Crear Comision</button>
                        <h2>Comisiones: </h2>

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Cantidad máxima de alumnos</th>
                                    <th>Días</th>
                                    <th>Horarios</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $columna = "id_materia";
                                $valor = $exp[1];
                                $comisiones = CoursesC::ViewCommissionsC($columna,$valor);
                                foreach ($comisiones as $key => $value)
                                {
                                    echo '<tr>
                                    <td>'.$value["numero"].'</td>
                                    <td>'.$value["c_maxima"].'</td>
                                    <td>'.$value["dias"].'</td>
                                    <td>'.$value["horario"].'</td>

                                    <td>
                                        <button class="btn btn-primary">Generar PDF</button>
                                      <a href="http://localhost/project-01/index.php?url=Crear-Comisiones/'.$exp[1].'&Mid='.$exp[1].'&Cid='.$value["id"].'">
                                        <button class="btn btn-danger">Eliminar</button>
                                      </a>
                                    </td>
                                </tr>';
                                }

                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="CrearComision">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="box-body">
                    <div class="form-group">
                        <h2>Número</h2>
                        <input type="number" name="numero" required class="form-control input-lg">
                        <?php
                        echo '<input type="hidden" name="id_materia" value="'.$materia["id"].'" required class="form-control input-lg">
';
                        ?>
                    </div>

                    <div class="form-group">
                        <h2>Cantidad maxima de alumnos</h2>
                        <input type="number" name="c_maxima" required class="form-control input-lg">
                    </div>

                    <div class="form-group">
                        <h2>Dias</h2>
                        <input type="text" name="dias" required class="form-control input-lg">
                    </div>

                    <div class="form-group">
                        <h2>Horarios</h2>
                        <input type="text" name="horarios" required class="form-control input-lg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Salir</button>
                </div>
                <?php

                $crearC = new CoursesC();
                $crearC ->CreateCommissionC();

                ?>
            </form>
        </div>
    </div>
</div>

<?php

$crearC = new CoursesC();
$crearC ->DeleteCommissionsC();

?>