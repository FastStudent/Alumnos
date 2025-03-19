<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lista-alumnos', [
            'alumnos' => Alumno::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-alumno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'FNacimiento' => ['required', 'min:10', 'max:10'],
            'Ciudad' => ['required', 'min:5']
        ]);
    
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->FNacimiento = $request->FNacimiento;
        $alumno->Ciudad = $request->Ciudad;

        $alumno->save();

        return redirect('/alumnos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show-alumno', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit-alumno', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'FNacimiento' => ['required', 'min:10', 'max:10'],
            'Ciudad' => ['required', 'min:5']
        ]);

        
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->FNacimiento = $request->FNacimiento;
        $alumno->Ciudad = $request->Ciudad;
        $alumno->save();

        return redirect()->route('alumnos.show', $alumno);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
