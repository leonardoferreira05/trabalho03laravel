<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AutomovelRequest;
use App\Models\Automovel;

class AutomovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = 'Lista de Automoveis';

       // $automoveis = ['Gol', 'Corsa', 'Palio', 'Onix'];
        $automovel = automovel::all();

    
        return view('admin.automovel.index', compact('subtitulo', 'automovel'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action= route('admin.automovel.store');
        return view("admin.automovel.form", compact('action'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutomovelRequest $request)
    {
        Automovel::create($request->all());

        $request->session()->flash('sucesso', "Automovel $request->fabricante adicionado com Sucesso!");
        //$request->session()->flash('sucesso', "Modelo $request->modelo adicionado com Sucesso!");
        //$request->session()->flash('sucesso', "Cor $request->cor adicionado com Sucesso!");        
        return redirect()->route("admin.automovel.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $automovel= Automovel::find($id);
        $action= route('admin.automovel.update', $automovel->id);
        return view("admin.automovel.form", compact('automovel','action'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutomovelRequest $request, $id)
    {
        $automovel= Automovel::find($id);
        $automovel->update($request->all());
       // $automovel->fabricante = $request->fabricante;
       // $automovel->modelo = $request->modelo;
        //$automovel->cor = $request->cor;
        $automovel->save();

        $request->session()->flash('sucesso', "Automovel $request->fabricante alterado com Sucesso!");      
        return redirect()->route("admin.automovel.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Automovel::destroy($id);
        $request->session()->flash('sucesso', "Automovel $request->fabricante excluido com Sucesso!");
        return redirect()->route("admin.automovel.index");

    }
}
