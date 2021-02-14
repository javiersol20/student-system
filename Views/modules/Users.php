<?php

if ($_SESSION["rol"] != "Administrador") {
    echo '<script>
            window.location = "inicio";
        </script>';
    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Usuarios</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CreateUser">Crear Usuario</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped T">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Apellido</th>
                        <th>Nombres</th>
                        <th>Carrera</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Contraseña</th>
                        <th>Editar / Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $columna = "null";
                    $valor = "null";
                    $users = UsersC::GetUsersC($columna, $valor);

                    foreach ($users as $key => $value) {
                        echo '<tr>
                            <td>' . ($key + 1) . '</td>
                            <td>' . $value["apellido"] . '</td>
                            <td>' . $value["nombre"] . '</td>
                            <td>' . $value["carrera"] . '</td>
                            <td>' . $value["libreta"] . '</td>
                            <td>' . $value["rol"] . '</td>
                            <td>
                            <input type="password" class="form-control" value="' . $value["clave"] . '" readonly disabled>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-success EditarUsuario" Uid="' . $value["idUser"] . '" data-toggle="modal" data-target="#EditUser">Editar</button>
                                    <button class="btn btn-danger EliminarUsuario" Uid="' . $value["idUser"] . '">Borrar</button>

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

<!-- Inicio del modal (INSERTAR USUARIO) -->

<div class="modal fade" id="CreateUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group">
                            <h2>Apellido:</h2>
                            <input type="text" name="apellidoU" class="form-control input-lg" required
                                   placeholder="Ingrese el apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+">
                        </div>

                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" name="nombreU" class="form-control input-lg" required
                                   placeholder="Ingrese el nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+">
                        </div>

                        <div class="form-group">
                            <h2>Usuario:</h2>
                            <input type="text" name="usuarioU" id="libretaU" class="form-control input-lg" required
                                   placeholder="Ingrese el usuario" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]+">
                        </div>

                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="password" name="claveU" class="form-control input-lg" required
                                   placeholder="Ingrese la contraseña" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+">
                        </div>

                        <div class="form-group">
                            <h2>Seleccionar Carrera</h2>
                            <select class="form-control input-lg" name="carreraU">
                                <option value="--">--- Seleccionar carrera ---</option>

                                <?php
                                $careers = CareersC::ViewCareersC();

                                foreach ($careers as $key => $value) {
                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <h2>Seleccionar rol</h2>
                            <select class="form-control input-lg" name="rolU" required>
                                <option value="Null">Seleccionar rol</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Estudiante">Estudiante</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="create">Crear</button>
                    <button type="submit" class="btn btn-danger">Salir</button>
                </div>
                <?php
                $crear = new UsersC();
                $crear->CreateUserC();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Fin modal de insertar usuario -->

<!-- Inicio modal de editar -->

<div class="modal fade" id="EditUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-body">
                    <div class="box-body">

                        <div class="form-group">
                            <h2>Apellido:</h2>
                            <input type="text" name="apellidoUE" value="" id="apellidoUE" class="form-control input-lg"
                                   required placeholder="Ingrese el apellido">
                            <input type="hidden" name="Uid" id="Uid">
                        </div>

                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" name="nombreUE" id="nombreUE" class="form-control input-lg" required
                                   placeholder="Ingrese el nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+">
                        </div>

                        <div class="form-group">
                            <h2>Usuario:</h2>
                            <input type="text" name="usuarioUE" id="usuarioUE" class="form-control input-lg" required
                                   placeholder="Ingrese el usuario" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+">
                        </div>

                        <div class="form-group">
                            <h2>Contraseña:</h2>
                            <input type="text" name="claveUE" id="claveUE" class="form-control input-lg" required
                                   placeholder="Ingrese la contraseña" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+">
                        </div>

                        <div class="form-group" id="carrera">
                            <h2>Seleccionar Carrera</h2>
                            <select class="form-control input-lg" name="carreraUE" id="carreraUE">
                                <option id="carreras" value="Null">Seleccionar carrera</option>

                                <?php
                                $careers = CareersC::ViewCareersC();

                                foreach ($careers as $key => $value) {

                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <h2 id="rolActual"></h2>
                            <h2>Seleccionar rol</h2>
                            <select class="form-control input-lg" name="rolUE" id="rolUE" required>
                                <option id="rol">Seleccionar rol</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Estudiante">Estudiante</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
                    <button type="submit" class="btn btn-danger">Salir</button>
                </div>
                <?php
                $actualizarU = new UsersC();
                $actualizarU->UpdateUserC();
                ?>
            </form>
        </div>
    </div>
</div>
<?php
$eliminarU = new UsersC();
$eliminarU->DeleteUserC();
?>
<!-- Fin modal de editar usuario -->