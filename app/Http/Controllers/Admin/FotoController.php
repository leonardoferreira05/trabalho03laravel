<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Concessionaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idConcessionaria)
    {
        $concessionaria= Concessionaria::find($idConcessionaria);
        $fotos=Foto::where('concessionaria_id',$idConcessionaria)->get();
       return view('admin.concessionaria.fotos.index',compact('concessionaria','fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idConcessionaria)
    {
        $concessionaria= Concessionaria::find($idConcessionaria);
        return view('admin.concessionaria.fotos.form',compact('concessionaria'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idConcessionaria)
    {
        if($request->hasFile('foto')){

            if($request->foto->isValid()){

               $fotoURL= $request->foto->hashName("concessionaria/$idConcessionaria");

                $imagem=Image::make($request->foto)->fit(env('FOTO_LARGURA'),env('FOTO_ALTURA'));

                Storage::disk('public')->put($fotoURL,$imagem->encode());

               $foto= new Foto();
               $foto->url=$fotoURL;
               $foto->concessionaria_id=$idConcessionaria;
               $foto->save();
            }
        }
        $request->session()->flash('sucesso', 'Foto incluida com sucesso');
        return redirect()->route('admin.concessionaria.fotos.index', $idConcessionaria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
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
