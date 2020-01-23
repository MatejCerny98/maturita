<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ucivo;

class UcivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ucivos = Ucivo::all()->toArray();
        return view('učivo', compact('ucivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vytvorucivo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Predmet' => 'required',
            'Ucivo' => 'required',
            'Obsah' => 'required'

        ]);


        $ucivo = new Ucivo([
            'Predmet' => $request->get('Predmet'),
            'Ucivo' => $request->get('Ucivo'),
            'Obsah' => $request->get('Obsah')

        ]);
        $ucivo->save();
        return redirect()->route('učivo')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ucivo = Ucivo::find($id);
        return view('upravucivo', compact('ucivo', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Predmet' => 'required',
            'Ucivo' => 'required',
            'Obsah' => 'required'
        ]);
        $ucivo = Ucivo::find($id);
        $ucivo->Predmet = $request->get('Predmet');
        $ucivo->Ucivo = $request->get('Ucivo');
        $ucivo->Obsah = $request->get('Obsah');
        $ucivo->save();
        return redirect()->route('učivo')->with('Success', 'Dáta aktualizované');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ucivo = Ucivo::find($id);
        $ucivo->delete();
        return redirect()->route('učivo')->with('success', 'Data Deleted');
    }
}
