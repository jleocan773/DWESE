<?php

class Alumno extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    function render()
    {

        # Creo la propiedad title de la vista
        $this->view->title = "Home - Panel Control Alumnos";

        # Creo la propiedad alumnos dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->alumnos = $this->model->get();

        $this->view->render('alumno/main/index');
    }

    function new()
    {

        # etiqueta title de la vista
        $this->view->title = "Añadir - Gestión Alumnos";

        #  obtener los cursos  para generar dinámicamente lista cursos
        $this->view->cursos = $this->model->getCursos();

        # cargo la vista con el formulario nuevo alumno
        $this->view->render('alumno/new/index');
    }

    function create($param = [])
    {

        //Se inicia sesión
        session_start();

        //Seguridad. Saneamos los datos del formulario
        //El operador de asignación de fusión de NULL ??= asigna el valor del operando de la derecha a su operando de la izquierda solo si este último se evalúa como null. 
        //El operador ??= no evalúa su operando derecho si el operando izquierdo se evalúa como no NULL.
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $poblacion = filter_var($_POST['poblacion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fechaNac = filter_var($_POST['fechaNac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_curso = filter_var($_POST['id_curso'] ??= '', FILTER_SANITIZE_NUMBER_INT);


        # Cargamos los datos del formulario
        $alumno = new classAlumno(
            null,
            $nombre,
            $apellidos,
            $email,
            $telefono,
            null,
            $poblacion,
            null,
            null,
            $dni,
            $fechaNac,
            $id_curso
        );

        #Validación
        $errores = [];

        //Nombre obligatorio
        if (empty($nombre)) {
            $errores['nombre'] = 'El campo "nombre" está vacío';
        };


        //Apellidos obligatorio
        if (empty($apellidos)) {
            $errores['apellidos'] = 'El campo "apellidos" está vacío';
        };


        //Email obligatorio, formato válido y clave secundaria
        if (empty($email)) {
            $errores['email'] = 'El campo "email" está vacío';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El campo "email" no tiene el formato correcto';
        } else if (!$this->model->validacionUniqueEmail($email)) {
            $errores['email'] = 'Este email ya existe en la base de datos.';
        }


        //DNI obligatorio, formato válido y clave secundaria
        //Expresión regular del dni
        $options = [
            'options' => [
                'regexp' => '/^([0-9]{8})([A-Z])$/'
            ]
        ];

        if (empty($dni)) {
            $errores['dni'] = 'El campo "dni" está vacío';
        } else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
            $errores['dni'] = 'El campo "dni" no tiene el formato correcto';
        } else if (!$this->model->validacionUniqueDNI($dni)) {
            $errores['dni'] = 'Este dni ya existe en la base de datos.';
        }


        //Fecha Obligatoria y válida (día / mes / año)
        if (empty($fechaNac)) {
            $errores['fechaNac'] = 'El campo "fechaNac" está vacío';
        } else {
            $fechaNacValores = explode('/', $fechaNac);
            if (count($fechaNacValores) !== 3 && checkdate($fechaNacValores[1], $fechaNacValores[0], $fechaNacValores[2])) {
                $errores['fechaNac'] = 'El campo "fechaNac" no tiene el formato correcto';
            }
        }


        //ID_curso obligatorio, entero y existente
        if (empty($id_curso)) {
            $errores['id_curso'] = 'El campo "curso" está vacío';
        } else if (!filter_var($id_curso, FILTER_VALIDATE_INT)) {
            $errores['id_curso'] = 'El campo "curso" no tiene el formato correcto';
        } else if (!$this->model->validacionCurso($id_curso)) {
            $errores['id_curso'] = 'Este Curso NO existe en la base de datos.';
        }

        //Comprobar validaciones

        if (!empty($errores)) {
            //Si el array no está vacío ha habido algún error
            $_SESSION['alumno'] = serialize($alumno);

        } else {
            //Si está vacío todo está bien y se continua
            # Añadir registro a la tabla
            $this->model->create($alumno);

            //Crear mensaje de éxito
            $_SESSION["mensaje"] = "Alumno creado correctamente";

            # Redirigimos al main de alumnos
            header('location:' . URL . 'alumno');
        }
    }

    function edit($param = [])
    {

        # obtengo el id del alumno que voy a editar
        // alumno/edit/4

        $id = $param[0];

        # asigno id a una propiedad de la vista
        $this->view->id = $id;

        # title
        $this->view->title = "Editar - Panel de control Alumnos";

        # obtener objeto de la clase alumno
        $this->view->alumno = $this->model->read($id);

        # obtener los cursos
        $this->view->cursos = $this->model->getCursos();

        # cargo la vista
        $this->view->render('alumno/edit/index');
    }

    public function update($param = [])
    {

        # Cargo id del alumno
        $id = $param[0];

        # Con los detalles formulario creo objeto alumno
        $alumno = new classAlumno(

            null,
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['email'],
            $_POST['telefono'],
            null,
            $_POST['poblacion'],
            null,
            null,
            $_POST['dni'],
            $_POST['fechaNac'],
            $_POST['id_curso']

        );

        # Actualizo base  de datos
        $this->model->update($alumno, $id);

        # Cargo el controlador principal de alumno
        header('location:' . URL . 'alumno');
    }

    public function order($param = [])
    {

        # Obtengo criterio de ordenación
        $criterio = $param[0];

        # Creo la propiedad title de la vista
        $this->view->title = "Ordenar - Panel Control Alumnos";

        # Creo la propiedad alumnos dentro de la vista
        # Del modelo asignado al controlador ejecuto el método get();
        $this->view->alumnos = $this->model->order($criterio);

        # Cargo la vista principal de alumno
        $this->view->render('alumno/main/index');
    }

    public function filter($param = [])
    {

        # Obtengo expresión de búsqueda
        $expresion = $_GET['expresion'];

        # Creo la propiedad title de la vista
        $this->view->title = "Buscar - Panel Control Alumnos";

        # Filtro a partir de la  expresión
        $this->view->alumnos = $this->model->filter($expresion);

        # Cargo la vista principal de alumno
        $this->view->render('alumno/main/index');
    }
}
