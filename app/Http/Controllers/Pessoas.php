<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Pessoas extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Pessoa::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $pessoa = new Pessoa;

        $pessoa->name = $request->input('name');
        $pessoa->email = $request->input('email');
        $pessoa->save();

        return 'Pessoa salva com sucesso identificador ' . $pessoa->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Pessoa::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $pessoa = Pessoa::find($id);

        $pessoa->name = $request->input('name');
        $pessoa->email = $request->input('email');
        $pessoa->save();

        return "Pessoa atualizada com sucesso #" . $pessoa->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        $pessoa = Pessoa::find($id);

        $pessoa->delete();

        return "Pessoa deletada #" . $request->input('id');
    }
} 


