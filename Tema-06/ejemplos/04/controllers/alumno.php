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

        //Cambio la etiqueta de la vista
        $this->view->title = "Añadir - Gestión Alumnos";

        //Cargo los cursos para generar dinámicamente lista de cursos
        $this->view->cursos = $this->model->getCursos();

        $this->view->render('alumno/new/index');
    }
}
