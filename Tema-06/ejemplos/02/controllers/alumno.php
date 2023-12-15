<?php

class Alumno extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    function render()
    {
        //Creamos la variable alumnos dentro de la vista
        //Esta variable ejecuta el método get() del modelo alumnoModel
        $this->view->alumnos = $this->model->get();

        $this->view->render('alumno/main/index');
    }

    function new(){
        $this->view->render('alumno/new/index');
    }
}
