<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller {

    public function index() {
        //
        $turmas = Turma::latest()->paginate(5);
        return view('turmas.index', compact('turmas'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('turmas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $request->validate([
            'nome' => 'required'
        ]);
        Turma::create($request->all());

        return redirect()->route('turmas.index')
                        ->with('success', 'Curso inserido com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma) {
        //
        return view('turmas.view', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma) {
        //
        return view('turmas.edit', compact('turma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma $turma) {
        //
        $request->validate(['nome' => 'required']);

        Turma::update($request->all());
        return redirect()->route('turmas.index')
                        ->with('success', 'Curso created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma) {
        //
        $turma->delete();

        return redirect()->route('turmas.index')
                        ->with('success', 'Curso deleted successfully');
    }

}
