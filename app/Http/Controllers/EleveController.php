<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve; 
use App\Models\Classe; 

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::with('classe')->get();
        return view('eleve.index',compact ('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        return view('eleve.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'age'=>'required',
            'classe_id'=>'required'
        ]);
        $eleve = Eleve::create($request->all());
        return redirect()->route('eleve.index')->with('success','Eleve ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eleve = Eleve::find($id);
        return view('eleve.show',compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eleve = Eleve::find($id);
        $classes = Classe::all();
        return view('eleve.edit',compact('eleve','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'age'=>'required',
            'classe_id'=>'required'
        ]);

        $eleve = Eleve::find($id);
        $eleve->update($request->all());
        return redirect()->route('eleve.index')->with('success','Eleve mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eleve = Eleve::find($id);
        $eleve->delete();
        return redirect()->route('eleve.index')->with('success','Eleve supprimé avec succès');
    }
}
