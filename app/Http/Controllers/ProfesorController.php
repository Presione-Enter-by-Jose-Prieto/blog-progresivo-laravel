<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CursoAcademico;


class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profesores.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:profesores,email',
            'password' => 'required|string|min:6|confirmed',
            'especialidad' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'curso_titular' => 'nullable|string|max:255',
        ]);

        $fotoPath = null;
        if($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profesores', 'public');
        }
        
        $profesor = Profesor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'titular' => $request->curso_titular,
            'especialidad' => $request->especialidad,
            'foto' => $fotoPath,
        ]);

        if($request->curso_titular) {
            $curso = CursoAcademico::firstOrCreate(
                ['nombre' => $request->curso_titular],
                ['activo' => true, 'titular_id' => $profesor->id]
            );

            if ($curso->titular_id) {
                $titularActual = $curso->titular;
                $mensaje = "Este curso ya tiene un titular asignado: {$titularActual->nombre} {$titularActual->apellido}, no se pudo asignar. Si hay algún error, contacte con un administrador.";
                return redirect()->route('profesores.register')->withInput()->with('error', $mensaje);
            }

            $curso->titular_id = $profesor->id;
            $curso->save();
        }

        return redirect()->route('profesores.register')->with('success', 'Profesor registrado exitosamente.');
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
