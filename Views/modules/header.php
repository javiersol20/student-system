<header class="main-header">
    <!-- Logo -->
    <a href="inicio" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b class="fa fa-university" style="font-size: 25px; color: black;"></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="http://localhost/project-01/Views/img/logo.png" class="img-responsive" alt="Logo"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="http://localhost/project-01/Views/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="http://localhost/project-01/Views/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]. " - ".$_SESSION["rol"];  ?>
                                <small><?php date_default_timezone_set("America/Guatemala"); echo date("Y-m-d H:i:s"); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="mi-perfil" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout" class="btn btn-danger btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>