<?php

/*
    Clase conexión mediante msqli
*/

Class Conexion{
    //Objeto de la clase mysqli
    public $db;

    public function __construct(){

        try{
            $this->db = new mysqli("localhost", "root", "", "fp");
            if($this->db->connect_errno){
                throw new Exception('ERROR');
            }
        }

        catch(Exception $exception){
            echo 'ERROR: ' . $exception->getMessage();   
            echo "<br>";
            echo 'CÓDIGO: ' . $exception->getCode();
            echo "<br>";
            echo 'EN ARCHIVO: ' . $exception->getFile();
            echo "<br>";
            echo 'LÍNEA: ' . $exception->getLine();
            echo "<br>";
            exit();
        }
    }
}
?>