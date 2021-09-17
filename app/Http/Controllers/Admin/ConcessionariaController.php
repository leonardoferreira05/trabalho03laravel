<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConcessionariaRequest;
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
        $concessionarias =concessionaria::with(['titulo','endereco'])->get();
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
        //$concessionarias = concessionaria::all();
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
        $concessionarias= concessionaria::create($request->all());
        $concessionarias=endereco()->create($request->all());

        if($request->has('proximidades')){
            $concessionarias->proximidades()->sync($request->proximidades);
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
    //Remover o endereço
    $concessionaria->endereco->delete();
    //Remover o Imovel
    $concessionaria->delete();
    DB::commit ();
    $request->Sessions()->flash('sucesso', "Concessionaria excluido com sucesso!");
    return redirect()->route('admin.concessionaria.index');

    }
}
