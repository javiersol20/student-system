<?php


class SettingsC
{
    static public function ViewSettingC($columna, $valor)
    {
        $tablaBD = "ajustes";
        $resultado = SettingsM::ViewSettingM($tablaBD,$columna,$valor);
        return $resultado;
    }
    public function ChangeSemesterC()
    {
        if(isset($_POST["semestreA"]))
        {
            $tablaBD = "ajustes";
            $semestre = $_POST["semestreA"];
            $resultado = SettingsM::ChangeSemesterM($tablaBD,$semestre);
            if($resultado == true)
            {
                echo '<script> window.location = "Editar-inicio"; </script>';
            }
        }
    }
    public function UpdateSettingsC()
    {
        if(isset($_POST["1_fecha_inicio"]))
        {
            $tablaBD = "ajustes";
            $datosC = [
                "1_fecha_inicio"=>$_POST["1_fecha_inicio"],
                "1_fecha_fin"=>$_POST["1_fecha_fin"],
                "2_fecha_inicio"=>$_POST["2_fecha_inicio"],
                "2_fecha_fin"=>$_POST["2_fecha_fin"],
                "examenes_i"=>$_POST["examenes_i"],
                "examenes_f"=>$_POST["examenes_f"],
                "materias_i"=>$_POST["materias_i"],
                "materias_f"=>$_POST["materias_f"]
            ];
            $resultado = SettingsM::UpdateSettingsM($tablaBD,$datosC);

            if($resultado == true)
            {
                echo '<script> window.location = "Editar-inicio"; </script>';
            }
        }
    }
}