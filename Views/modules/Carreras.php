<?php

if( $_SESSION["rol"] != "Administrador")
{
    echo '<script>
            window.location = "inicio";
            </script>';
    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gesto de carreras</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <form method="post">

                    <input type="text" name="carrera" class="form-control" placeholder="Ingrese la carrera" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]{2,254}">
                    <br>
                    <button type="submit" class="btn btn-success btn-block">Crear carrera</button>
                    <?php
                    $carrera = new CareersC();
                    $carrera->AddCareersC();

                    ?>

                </form>
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
                    <tr>
                        <td>1</td>
                        <td>Ingenieria</td>
                        <td>
                            <div class="btn-group">
                                <a href="">
                                    <button class="btn btn-success">Editar</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-danger">Borrar</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-warning">Materias</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-primary">Estudiantes</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </section>
</div>
