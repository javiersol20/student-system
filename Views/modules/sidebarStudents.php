<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="<?= $ruta ?>/inicio">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>


            <li>
                <a href="<?= $ruta ?>/Plan-de-Estudios">
                    <i class="fa fa-home"></i>
                    <span>Plan de estudios</span>
                </a>
            </li>

            <li>
                <a href="<?= $ruta ?>/Materias">
                    <i class="fa fa-home"></i>
                    <span>Inscripciones</span>
                </a>
            </li>

            <li>
                <?php
                echo '<a href="<?= $ruta ?>/Ver-Examenes/' . $_SESSION["id_carrera"] . '">';
                ?>

                <i class="fa fa-home"></i>
                <span>Éxamenes</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>Certificados</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?= $ruta ?>/Constancia-Alumno">
                            <span>Constancia de alumnos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= $ruta ?>/Constancia-Materia">
                            <span>Constancia de Materias</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
</aside>