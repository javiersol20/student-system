<div class="content-wrapper">
    <section class="content">
        <div class="box-body">
            <?php
            $datos = new UsersC();
            $datos->GetMyDataC();

            $guardar = new UsersC();
            $guardar->EditDataC();
            ?>
        </div>
    </section>
</div>