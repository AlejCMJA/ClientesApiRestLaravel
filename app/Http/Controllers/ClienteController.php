<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = clientes::all();

        $listaUsuarios = [];
        foreach ($usuarios as $usuario) {
            $usuarioData = [
                'idUsuario' => $usuario->idUsuario,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'telephone' => $usuario->telephone,
                'direction' => $usuario->direction,
                'cedula' => $usuario->cedula,
                'edad' => $usuario->edad,
            ];

            $listaUsuarios[] = $usuarioData;
        }

        $usuariosResponse = [
            'listaUsuarios' => $listaUsuarios
        ];

        return response()->json($usuariosResponse);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente = new Clientes();
        $cliente->nombre = $request->input('nombre');
        $cliente->email = $request->input('email');
        $cliente->save();

        return response()->json($cliente, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Clientes::find($id);

        if ($cliente) {
            $clienteData = [
                'idUsuario' => $cliente->idUsuario,
                'nombre' => $cliente->nombre,
                'email' => $cliente->email,
            ];

            return response()->json($clienteData);
        } else {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
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
    public function update(Request $request, $id)
    {
        $cliente = Clientes::find($id);

        if ($cliente) {
            $cliente->nombre = $request->input('nombre');
            $cliente->email = $request->input('email');
            $cliente->save();

            return response()->json($cliente);
        } else {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Clientes::find($id);

        if ($cliente) {
            $cliente->delete();

            return response()->json(['message' => 'Cliente eliminado']);
        } else {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
    }
}
