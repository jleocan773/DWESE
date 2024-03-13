<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

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
        // Cargamos los datos del alumno
        $alumno = Student::find($id);

        // Redirige a la vista home
        return view('students.show', ['alumno' => $alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cargo los datos del alumno
        $alumno = Student::find($id);

        // Cargo los cursos
        $cursos = Course::all()->sortBy('id');

        // Llamamos a la vista
        return view('students.edit', ['alumno' => $alumno, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Recibe los datos del formulario
        $post = $request->all();

        // Validación del formulario edit
        $request->validate([
            'name' => ['required', 'max:35', 'string'],
            'lastname' => ['required', 'max:45', 'string'],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'max:40', 'email', Rule::unique('students')->ignore($id)],
            'phone' => ['required', 'max:13', 'string'],
            'city' => ['required', 'max:20', 'string'],
            'dni' => ['required', 'max:9', 'string', Rule::unique('students')->ignore($id)],
            'course_id' => ['required', 'exists:courses,id']
        ]);

        // Cargamos los datos del alumno que estamos editando
        $alumno = Student::find($id);

        // Actualizar los campos del alumno con los datos del formulario
        $alumno->name = $request->name;
        $alumno->lastname = $request->lastname;
        $alumno->birth_date = $request->birth_date;
        $alumno->email = $request->email;
        $alumno->phone = $request->phone;
        $alumno->city = $request->city;
        $alumno->dni = $request->dni;
        $alumno->course_id = $request->course_id;

        //Actualizamos la base de datos
        $alumno->save();

        //Redireccionamos a la vista principal
        return redirect()->route('alumnos.index')->with('success', "Alumno editado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimino el alumno
        Student::destroy($id);

        //Redireccionamos a la vista principal
        return redirect()->route('alumnos.index')->with('success', "Alumno eliminado correctamente");
    }
}
