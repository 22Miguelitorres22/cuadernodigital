<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\User;
use Illuminate\Http\Request;

class ComunicadoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        return view('comunicado.main');
    }

    public function list() {
        $comunicados = Comunicado::paginate(25);

        return view('comunicado.list')->with('comunicados', $comunicados);
    }

    public function edit(int $id = null) {
        $comunicado = null;

        if ($id) {
            $comunicado = Comunicado::find($id);
        }


        $usuarios = User::all();
        return view('comunicado.create-edit-form')
            ->with('comunicado', $comunicado)
            ->with('usuarios', $usuarios);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'contenido' => 'required',
            'user_id' => 'required'
        ]);

        $comunicado = Comunicado::create([
            'contenido' => $request->contenido,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('comunicados.list');
    }
}
