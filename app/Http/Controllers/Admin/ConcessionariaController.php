<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Automovel;
use App\Models\Tipo;
use App\Models\Concessionaria;
use App\Models\Finalidade;
use App\Models\Proximidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConcessionariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.concessionaria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $automovel = automovel::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades= proximidade::all();
        $action = route('admin.concessionaria.store');
        return view('admin.concessionaria.form', compact('action', 'automovel', 'tipo', 'finalidade','proximidade'));

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $concessionaria= concessionaria::create($request)->all());
        $concessionaria=endereco()->create($request->all());

        if($request->has('proximidades')){
            $concessionaria->proximidades()->sync($request->proximidades);
        }
        DB::Commit();

        $request->session()->flash('sucesso', "Concessionaria incluida com Sucesso!");
        return redirect()->route("admin.concessionaria.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
