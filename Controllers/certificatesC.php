<?php


class CertificatesC
{
    public function RequestCertificateC()
    {
        if (isset($_POST["id_alumno"])) {

            $tablaBD = "certificados";

            $datosC = ["id_alumno" => $_POST["id_alumno"], "tipo" => $_POST["tipo"], "estado" => $_POST["estado"]];

            $resultado = CertificatesM::RequestCertificateM($tablaBD, $datosC);

            if ($resultado == true) {

                echo '<script>

				window.location = "inicio";
				</script>';

            }

        }
    }

    static public function ViewCertificateC($columna, $valor)
    {
        $tablaBD = "certificados";

        $resultado = CertificatesM::ViewCertificateM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function UpdateStatusC()
    {
        if (isset($_POST["Eid"])) {
            $tablaBD = "certificados";
            $datosC = ["id" => $_POST["Eid"], "estado" => $_POST["estado"]];

            $respuesta = CertificatesM::UpdateStatusM($tablaBD, $datosC);

            if ($respuesta == true) {
                echo '<script>

				window.location = "Certificados";
				</script>';
            }
        }
    }
}