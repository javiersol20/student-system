<?php

require_once "../Controllers/usersC.php";
require_once "../Models/usersM.php";

class UsersA
{
    public $Uid;

    public function EditUsersA()
    {
        $columna = "id";
        $valor = $this->Uid;
        $resultado = UsersC::GetUsersC($columna, $valor);
        echo json_encode($resultado);
    }

    public $verificarLibreta;

    public function CheckUserA()
    {
        $columna = "libreta";
        $valor = $this->verificarLibreta;
        $resultado = UsersC::GetUsersC($columna, $valor);
        echo json_encode($resultado);
    }
}

if (isset($_POST["Uid"])) {

    $editarU = new UsersA();
    $editarU->Uid = $_POST["Uid"];
    $editarU->EditUsersA();
}
if (isset($_POST["verificarLibreta"])) {
    $check = new UsersA();
    $check->verificarLibreta = $_POST["verificarLibreta"];
    $check->CheckUserA();
}