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

        <h1>Editar Carrera</h1>

    </section>


    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    <?php

                    $editarCarrera = new CareersC();
                    $editarCarrera->EditCareersC();
                    $editarCarrera->UpdateCareersC();

                    ?>

                </form>

            </div>

        </div>

    </section>

</div>