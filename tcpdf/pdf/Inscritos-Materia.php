<?php

require_once "../../Controllers/coursesC.php";
require_once "../../Models/coursesM.php";
require_once "../../Controllers/usersC.php";
require_once "../../Models/usersM.php";

class pdfCourseEnrolled
{

    public function pdfEnrolled()
    {
        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);

        $pdf->AddPage();

        $link = $_SERVER['REQUEST_URI'];

        $exp = explode("/", $link);

        $columna = "id";

        $valor = $exp[5];

        $materia = CoursesC::ViewCoursesC($columna, $valor);

        $columna = "id";

        $valor = $exp[6];
        $row = "Null";
        $comision = CoursesC::ViewCommissionsC($columna, $valor, $row);

        $html = <<<EOF
    
<center><img src="images/logo.png"></center>
	<br><br>

	<h2>Inscriptos para la Materia: $materia[nombre]</h2>

	<h2>Comisión: $comision[numero] - Dias: $comision[dias] - Horario: $comision[horario]</h2>

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">Comisión</td>
			<td style="border: 1px solid black width:115px;">Libreta</td>
			<td style="border: 1px solid black width:250px;">Alumno</td>

		</tr>

	</table>

EOF;

        $pdf->writeHTML($html, false, false, false, false, '');
        $columna = "id_materia";
        $valor = $exp[5];
        $row = "Null";
        $inscriptos = CoursesC::SeeQuotaC($columna, $valor, $row);


        foreach ($inscriptos as $key => $value) {

            $columna = "id";
            $valor = $value["id_alumno"];

            $alumnos = UsersC::GetUsersC2($columna, $valor);

            foreach ($alumnos as $key => $v) {

                if ($value["id_comision"] == $exp[6]) {

                    $columna = "id";
                    $valor = $exp[6];
                    $row = 1;
                    $comision = CoursesC::ViewCommissionsC($columna, $valor, $row);

                    $html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">$value[id_comision]</td>
			<td style="border: 1px solid black width:115px;">$v[libreta]</td>
			<td style="border: 1px solid black width:250px;">$v[apellido], $v[nombre]</td>

		</tr>

	</table>

EOF;


                    $pdf->writeHTML($html2, false, false, false, false, '');

                }
            }
        }

        $pdf->Output('Insc-Comision-' . $comision["numero"] . '-' . $materia["nombre"] . '.pdf');
    }
}

$a = new pdfCourseEnrolled();
$a->pdfEnrolled();