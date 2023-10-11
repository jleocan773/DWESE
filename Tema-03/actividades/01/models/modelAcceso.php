<?php

    /* 

        Modelo: modelAcceso.php
        Descripción: Procesa los valores del formulario

    */      
        
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordConfirmation = $_POST["passwordConfirmation"];
        $perfil = $_POST["perfil"];

        //Para si los valores se suben correctamente
        //print_r($_POST);

        //Validación
        if ($password != $passwordConfirmation){
            echo "Las contraseñas no son iguales";
        } else {
            echo "Las contraseñas son iguales";
        }
