<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra los alumnos
        $alumnos = Student::all()->sortBy('id');
        return view('students.home', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carga formulario de un nuevo alumno
        // Necesitamos cargar los cursos para poder hacer el select
        $cursos = Course::all()->sortBy('id');
        return view('students.create', ['cursos' => $cursos]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recibe los datos del formulario
        $post = $request->all();

        // Valida los  datos
        $request->validate([
            'name' => ['required', 'max:35', 'string'],
            'lastname' => ['required', 'max:45', 'string'],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'max:40', 'email', 'unique:students'],
            'phone' => ['required', 'max:13', 'string'],
            'city' => ['required', 'max:20', 'string'],
            'dni' => ['required', 'max:9', 'string', 'unique:students'],
            'course_id' => ['required', 'exists:courses,id']
        ]);

        // Creamos un objeto de la clase Alumno
        $alumno = Student::create([
            'name' => $post['name'],
            'lastname' => $post['lastname'],
            'birth_date' => $post['birth_date'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'city' => $post['city'],
            'dni' => $post['dni'],
            'course_id' => $post['course_id']
        ]);

        //Guardamos el objeto
        $alumno->save();

        // Redirige a la vista home
        return redirect()->route('alumnos.index')->with('success', "Alumno creado correctamente");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
