$(".T").on("click", ".EditarUsuario", function () {
    var Uid = $(this).attr("Uid");

    var datos = new FormData();
    datos.append("Uid", Uid);

    $.ajax({
        url: "Ajax/usersA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultado) {
            $("#Uid").val(resultado["id"]);
            $("#apellidoUE").val(resultado["apellido"]);
            $("#nombreUE").val(resultado["nombre"]);
            $("#usuarioUE").val(resultado["libreta"]);
            $("#claveUE").val(resultado["clave"]);

            if (resultado["rol"] == "Administrador") {
                $("#carrera").hide();
            } else {
                $("#carrera").show();
            }

            $("#rol").html("Rol actual: " + resultado["rol"]);
            $("#carreras").val(resultado["id_carrera"]);

            $("#rolUE").val(resultado["rol"]);
        }
    });
});

$(".T").on("click", ".EliminarUsuario", function () {
    var Uid = $(this).attr("Uid");
    window.location = "index.php?url=Users&Uid=" + Uid;

});

$("#libretaU").change(function () {
    $(".alert").remove();
    var libreta = $(this).val();
    var datos = new FormData();
    datos.append("verificarLibreta", libreta);
    $.ajax({
        url: "Ajax/usersA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultado) {
            if (resultado) {
                $("#libretaU").parent().after('<div class="alert alert-danger">El nombre de usuario ya existe</div>');

            }
        }
    })
});











