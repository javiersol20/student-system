<?php

class ConnectionDB
{
    public function cDB()
    {
        # Estableciendo conexión con la bd

        $bd = new PDO("mysql:host=localhost;dbname=sistemaestudiantil", "root", "");
        $bd->exec("SET NAMES utf8");
        return $bd;
    }
}