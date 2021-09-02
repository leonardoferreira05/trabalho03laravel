<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AutomovelRequest;

use App\Models\automovel;

class AutomovelController extends Controller
{
    public function automovel(){
        $subtitulo = 'Lista de Automoveis';

       // $automoveis = ['Gol', 'Corsa', 'Palio', 'Onix'];
        $automovel = automovel::all();

    
        return view('admin.automovel.index', compact('subtitulo', 'automovel'));
    }

    public function formAdicionar()
    {
        $action= route('admin.automovel.adicionar');
        return view("admin.automovel.form", compact('action'));
    }

    public function adicionar(AutomovelRequest $request)
    {
        
        Automovel::create($request->all());

        $request->session()->flash('sucesso', "Automovel $request->fabricante adicionado com Sucesso!");
        //$request->session()->flash('sucesso', "Modelo $request->modelo adicionado com Sucesso!");
        //$request->session()->flash('sucesso', "Cor $request->cor adicionado com Sucesso!");

        
        return redirect()->route("admin.automovel.listar");
    }

    public function deletar($id, Request $request)
    { 
        Automovel::destroy($id);
        $request->session()->flash('sucesso', "Automovel $request->fabricante excluido com Sucesso!");
        return redirect()->route("admin.automovel.listar");
    } 
    
    public function formEditar($id, Request $request)
    { 
        $automovel= Automovel::find($id);
        $action= route('admin.automovel.editar', $automovel->id);
        return view("admin.automovel.form", compact('automovel','action'));
    }
    public function editar(AutomovelRequest $request, $id)
    { 
        $automovel= Automovel::find($id);
        $automovel->update($request->all());
       // $automovel->fabricante = $request->fabricante;
       // $automovel->modelo = $request->modelo;
        //$automovel->cor = $request->cor;
        $automovel->save();

        $request->session()->flash('sucesso', "Automovel $request->fabricante alterado com Sucesso!");      
        return redirect()->route("admin.automovel.listar");
    }          
}
