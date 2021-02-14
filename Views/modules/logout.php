<?php

if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {

    $_SESSION["Ingresar"] = false;
    session_destroy();
    echo '<script>

window.location = "Ingresar";

</script>';

}
