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
        $comunicados = Comunicado::where('user_id', auth()->user()->id)
            ->orWhere('destination_user_id', auth()->user()->id)
            ->paginate(25);

        return view('comunicado.list')->with('comunicados', $comunicados);
    }

    public function view(int $id = null) {
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
            'destination_user_id' => 'required'
        ]);

        $comunicado = Comunicado::create([
            'contenido' => $request->contenido,
            'user_id' => auth()->user()->id,
            'destination_user_id' => $request->destination_user_id
        ]);

        return redirect()->route('comunicados.list');
    }

    public function edit(int $id, Request $request) {
        $this->validate($request, [
            'contenido' => 'required',
            'destination_user_id' => 'required'
        ]);

        $comunicado = Comunicado::find($id);

        $comunicado->contenido = $request->contenido;
        $comunicado->destination_user_id = $request->destination_user_id;

        $comunicado->save();

        return redirect()->route('comunicados.list');
    }
}
