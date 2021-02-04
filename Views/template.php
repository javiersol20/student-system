<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link  rel="icon"   href="Views/img/icon.png" type="image/png" />
    <title>Sistema</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="Views/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Views/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="Views/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="Views/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="Views/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black-light sidebar-mini login-page">
<!-- Site wrapper -->

<?php
if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {
    echo '<div class="wrapper">';
    include "modules/header.php";

    if ($_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Desarrollador") {
        include "modules/sidebar.php";
    }
    $url = [];

    if (isset($_GET["url"])) {
        $url = explode("/", $_GET["url"]);
        if ($url[0] == "inicio" || $url[0] == "logout" || $url[0] == "mi-perfil" || $url[0] == "Carreras") {
            include "modules/" . $url[0] . ".php";
        }

    } else {
        include "modules/inicio.php";
    }
    echo '</div>';
} if (isset($_GET["url"])) {
    if ($_GET["url"] == "Ingresar") {

        include "modules/Ingresar.php";
    }
} else {
    include "modules/Ingresar.php";
}
?>




<!-- jQuery 3 -->
<script src="Views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="Views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="Views/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="Views/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Views/dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
</body>
</html>
