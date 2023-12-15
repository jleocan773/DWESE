<?php

class Alumno extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    function render()
    {
        $this->view->nombre = 'Jonathan';
        $this->view->apellidos = 'León Canto';

        $this->view->render('alumno/main/index');
    }

    function new(){
        $this->view->render('alumno/new/index');
    }
}
