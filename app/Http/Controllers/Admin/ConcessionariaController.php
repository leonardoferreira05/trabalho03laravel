<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConcessionariaRequest;
use App\Models\Automovel;
//use App\Models\Endereco;
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
        $concessionarias =concessionaria::with(['automovel','endereco'])->get();
        return view('admin.concessionaria.index', compact('concessionarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $automovel = automovel::all();
        //$enderecos = endereco::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades= proximidade::all();
        $action = route('admin.concessionaria.store');
        return view('admin.concessionaria.form', compact('action', 'automovel', 'tipos', 'finalidades','proximidades'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConcessionariaRequest $request)
    {
        DB::beginTransaction();
        $concessionaria= Concessionaria::create($request->all());
        $concessionaria->endereco()->create($request->all());

        if($request->has('proximidade')){
            $concessionaria->proximidade()->sync($request->proximidade);
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
        $concessionaria= concessionaria::with(['automovel', 'tipo', 'finalidade','proximidade'])->find($id);
        return view('admin.concessionaria.show', compact('concessionaria'));
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
    public function update(ConcessionariaRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Concessionaria::Destroy($id);
    $concessionaria = Concessionaria::find($id);

    DB::beginTransaction();
    //
    $concessionaria->automovel->delete();
    //
    $concessionaria->delete();
    DB::commit ();
    $request->Sessions()->flash('sucesso', "Concessionaria excluido com sucesso!");
    return redirect()->route('admin.concessionaria.index');

    }
}
