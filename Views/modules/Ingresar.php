<div class="login-box">
    <div class="login-logo">
        <img src="Views/img/logo.png" alt="logo" class="img-responsive">
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Inicio de Sesión</p>

        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="libreta" placeholder="Libreta">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>

            </div>
            <?php
            $ingreso = new UsersC();
            $ingreso->Login();
            ?>
        </form>

    </div>

</div>
