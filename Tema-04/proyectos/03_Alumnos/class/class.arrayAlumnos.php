<?php

/*
    Clase ArrayAlumnos.php

    Simulará la tabla de alumnos

    Es un array donde cada elemento es una instancia de la clase Alumno

*/


class ArrayAlumnos
{
    public $tabla;


    public function __construct()
    {
        $this->tabla = [];
    }

    static public function getCursos()
    {
        $cursos = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'
        ];

        asort($cursos);
        return $cursos;
    }

    static public function getAsignatura()
    {
        $asignaturas = [
            '1DAW Base de Datos',
            '1DAW Entornos de Desarrollo',
            '1DAW Formación y Orentación Laboral',
            '1DAW Lenguaje de Marcas y Sistemas de Gestión de Información',
            '1DAW Programación',
            '1DAW Sistemas Informáticos',
            '2DAW Desarrollo Web Entorno Cliente',
            '2DAW Desarrollo Web Entorno Servidor',
            '2DAW Despliegue de Aplicaciones Web'
        ];

        asort($asignaturas);

        return $asignaturas;
    }

    public function getAlumnos()
    {

        //Alumno
        $alumno = new Alumno(
            1,
            'Juan Manuel',
            'Herrera',
            'manuelgarvaz@educaand.es',
            '06/03/2002',
            3,
            [6, 7, 8]
        );

        //Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            2,
            'Jonathan',
            'León Canto',
            'jleocan773@g.educaand.es',
            '06/19/2000',
            3,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            3,
            'Ricardo',
            'Moreno Cantea',
            'rmorcan@g.educaand.es',
            '05/13/2004',
            3,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            4,
            'David',
            'Herrera Ramírez',
            'jmherrera@gmail.com',
            '03/06/2002',
            2,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            5,
            'Pablo',
            'Mateos Palas',
            'pmatpal0105@g.educaand.es',
            '05/01/2004',
            3,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            6,
            'Juan Maria',
            'Mateos Ponce',
            'jmherrera@gmail.com',
            '10/20/2004',
            5,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            7,
            'Jorge',
            'Coronil Villalba',
            'jcorvil600@gmail.com',
            '04/17/1997',
            3,
            [6, 7, 8],
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            8,
            'Diego',
            'González Romero',
            'diegogonzalezromero@gmail.com',
            '03/28/2001',
            3,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            9,
            'Adrián',
            'Merino Gamaza',
            'aamergam@g.educand.es',
            '12/10/2002',
            2,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            10,
            'Daniel Alfonso',
            'Rodríguez Santos',
            'darancuga@gmail.com',
            '08/27/1999',
            2,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            11,
            'Juan Jesus',
            'Muñoz Perez',
            'jjmunper@gmail.com',
            '03/06/2000',
            2,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            12,
            'Julian',
            'Garcia Velazquez',
            'jgarvel076@g.educaand.es',
            '12/01/2004',
            2,
            [5, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;

        //Se reasignan los valores de $alumno
        $alumno = new Alumno(
            13,
            'Antonio Jesús',
            'Téllez Perdigones',
            'atelper@gmail.com',
            '05/10/1999',
            0,
            [6, 7, 8]
        );

        // Se añade el alumno a la tabla
        $this->tabla[] = $alumno;
    }

    //Lo declaramos estáticos porque no cambian datos
    static public function mostrarAsignaturas($asignaturas, $asignaturasAlumno)
    {

        $array = [];

        foreach ($asignaturasAlumno as $indice) {

            $array[] = $asignaturas[$indice];
        }

        asort($array);
        return $array;
    }

    public function create(Alumno $data)
    {
        $this->tabla[] = $data;
    }

    public function delete($indice)
    {

        unset($this->tabla[$indice]);
        $this->tabla = array_values($this->tabla);
    }

    public function read($indice)
    {
        return $this->tabla[$indice];
    }

    public function update($indice, Alumno $data)
    {
        $this->tabla[$indice] = $data;
    }

    private function compararPorNombre($a, $b)
    {
        return strcmp($a->nombre, $b->nombre);
    }

    private function compararPorApellidos($a, $b)
    {
        return strcmp($a->apellidos, $b->apellidos);
    }

    private function compararPorEmail($a, $b)
    {
        return strcmp($a->email, $b->email);
    }

    private function compararPorFechaNacimiento($a, $b)
    {
        return strcmp($a->fecha_nacimiento, $b->fecha_nacimiento);
    }

    private function compararPorEdad($a, $b)
    {
        return strcmp($a->getEdad(), $b->getEdad());
    }

    private function compararPorCursos($a, $b)
    {
        return $a->curso - $b->curso;
    }

    private function compararPorAsignaturas($a, $b)
    {
        $asignaturasAlumnoA = $a->asignaturas;
        $asignaturasAlumnoB = $b->asignaturas;

        // Comparamos la asignatura más baja de cada alumno
        $minAsignaturasA = min($asignaturasAlumnoA);
        $minAsignaturasB = min($asignaturasAlumnoB);

        // Si las asignaturas mínimas son iguales, se compara la cantidad de asignaturas
        if ($minAsignaturasA === $minAsignaturasB) {
            $numAsignaturasA = count($asignaturasAlumnoA);
            $numAsignaturasB = count($asignaturasAlumnoB);

            // El alumno con menos asignaturas aparecerá primero
            return $numAsignaturasA - $numAsignaturasB;
        }

        // El alumno con la asignatura más baja aparecerá primero
        return $minAsignaturasA - $minAsignaturasB;
    }


    public function ordenarAlumnos($criterio)
    {
        switch ($criterio) {
            case 'nombre':
                usort($this->tabla, [$this, 'compararPorNombre']);
                break;
            case 'apellidos':
                usort($this->tabla, [$this, 'compararPorApellidos']);
                break;
            case 'email':
                usort($this->tabla, [$this, 'compararPorEmail']);
                break;
            case 'fecha_nacimiento':
                usort($this->tabla, [$this, 'compararPorFechaNacimiento']);
                break;
            case 'edad':
                usort($this->tabla, [$this, 'compararPorEdad']);
                break;
            case 'curso':
                usort($this->tabla, [$this, 'compararPorCursos']);
                break;
            case 'asignaturas':
                usort($this->tabla, [$this, 'compararPorAsignaturas']);
                break;
        }
    }

    public function filtrar($alumnos, $expresion) {
        
    }
    
    
    
}
