<?php

require_once "../../Controllers/coursesC.php";
require_once "../../Models/coursesM.php";

require_once "../../Controllers/usersC.php";
require_once "../../Models/usersM.php";


class pdfCMaterias
{

    public function pdfCM()
    {

        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);

        $pdf->AddPage();

        $link = $_SERVER['REQUEST_URI'];

        $exp = explode("/", $link);

        $columna = "id";
        $valor = $exp[5];

        $alumno = UsersC::GetUsersC($columna, $valor);


        $html1 = <<<EOF

	<center><img src="images/logo.png"></center>
	<br><br>

	<h2>Certificado de Materias</h2><br>

	<b>Alumno/a</b>: $alumno[apellido], $alumno[nombre]<br>
	<b>Libreta</b>: $alumno[libreta]<br>

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">Nombre</td>
			<td style="border: 1px solid black width:115px;">Año</td>
			<td style="border: 1px solid black width:250px;">Nota</td>

		</tr>

	</table>

EOF;


        $pdf->writeHTML($html1, false, false, false, false, '');

        $materias = CoursesC::ViewCoursesC();

        foreach ($materias as $key => $value) {

            if ($value["id_carrera"] == $alumno["id_carrera"]) {

                $columna = "id_materia";
                $valor = $value["id"];

                $nota = CoursesC::ViewNotesC($columna, $valor);

                foreach ($nota as $key => $n) {

                    if ($n["id_alumno"] == $alumno["id"] && $n["id_materia"] == $value["id"]) {


                        $html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black">$value[nombre]</td>
			<td style="border: 1px solid black">$value[grado]</td>
			<td style="border: 1px solid black">$n[nota_final]</td>

		</tr>

	</table>

EOF;


                        $pdf->writeHTML($html2, false, false, false, false, '');

                    }

                }

            }

        }


        $pdf->Output('Certificado-Materias-' . $exp[5] . '.pdf');


    }


}

$a = new pdfCMaterias();
$a->pdfCM();