<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {
        $test = \App\Test::all();
        return view('indextest')->with(['tests' => $test]);
    }

    public function create()
    {
        return view('vytvortest');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nazov' => 'required',
            'predmet' => 'required',
            'otazky' => 'required|array',
            'otazky.*.otazka' => 'required',
            'otazky.*.odpoved' => 'required|array',
            'otazky.*.odpoved.*.odpoved' => 'required',
        ]);

        $test = new Test();
        $test->nazov = $request->nazov;
        $test->predmet = $request->predmet;
        $test->save();

        foreach ($request->otazky as $otazka) {

            $novaotazka = new Question();
            $novaotazka->otazka = $otazka['otazka'];
            $novaotazka->test()->associate($test);
            $novaotazka->save();

            foreach ($otazka['odpoved'] as $odpoved) {
                $novaodpoved = new Answer();
                $novaodpoved->odpoved = $odpoved['odpoved'];
                $novaodpoved->spravna = isset($odpoved['spravna']) && $odpoved['spravna'] == 'on';
                $novaodpoved->question()->associate($novaotazka);
                $novaodpoved->save();
            }
        }
        return redirect()->route('test.index');
    }
    public function show($id){
        $test=Test::where('id', $id)->with(['questions' => function($q) {
            $q->with('answers');
        }])->first();
        return view('test')->with(['test' => $test]);


    }
}

