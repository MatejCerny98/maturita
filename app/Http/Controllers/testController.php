<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Result;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show($id)
    {
        $test = Test::where('id', $id)->with(['questions' => function ($q) {
            $q->with('answers');
        }])->first();
        if (!$test || !$test->spusteny)
        {
            return redirect()->back();
        }
        return view('test')->with(['test' => $test]);



    }

    public function validateTest(Request $request, $id)
    {
        $this->validate($request, [
            'odpoved' => 'required|array',
        ]);

        $test = Test::find($id);
        if (!$test) {
            return redirect()->route('test.index');
        }
        $pocetspravnych = 0;
        foreach ($request->odpoved as $otazka => $odpoved) {
            if ($o = Answer::find($odpoved)) {
                if ($o->spravna) {
                    $pocetspravnych++;
                }
            }
        }
        $vysledok=new Result();
        $vysledok->test()->associate($test);
        $vysledok->user()->associate(Auth::user());
        $vysledok->spravne=$pocetspravnych;
        $vysledok->save();
        return redirect()->route('test.index');
    }
    public function grades(){
        $znamka= Result::with('test')->where('user_id', Auth::user()->id)->get();
        return view('znamky')->with(['znamky' => $znamka]);
    }
    public function start($id){
        $zacat= Test::find($id);
        $zacat->spusteny=true;
        $zacat->save();
        return redirect()->back();
    }
    public function stop($id)
    {
        $zastavit = Test::find($id);
        $zastavit->spusteny = false;
        $zastavit->save();
        return redirect()->back();
    }

}

