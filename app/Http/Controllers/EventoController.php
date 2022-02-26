<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::paginate(25);
        return view('evento.main')->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evento.create-edit-form')->with('evento', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipo_evento' => 'required',
            'contenido' => 'required', 
            'fecha' => 'required'
        ]);

        $evento = Evento::create([
            'tipo_evento' => $request->tipo_evento,
            'user_id' => auth()->user()->id,
            'fecha' => $request->fecha,
            'contenido' => $request->contenido
        ]);

        return redirect()->route('eventos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return view('evento.create-edit-form')->with('evento', Evento::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('evento.create-edit-form')->with('evento', Evento::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tipo_evento' => 'required',
            'contenido' => 'required', 
            'fecha' => 'required'
        ]);

        $evento = Evento::find($id);

        $evento->tipo_evento = $request->tipo_evento;
        $evento->fecha = $request->fecha;
        $evento->contenido = $request->contenido;

        $evento->save();

        return redirect()->route('eventos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
        return back();
    }
}
