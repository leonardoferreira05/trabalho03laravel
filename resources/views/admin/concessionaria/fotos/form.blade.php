@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        <form action="{{route('admin.concessionaria.fotos.store', $concessionaria->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="file-field input-field">
                <div class="btn">
                    <span>Selecionar Foto</span>
                    <input type="file" name="foto"/>
                </div>
                <div class="file-path-wrapper">
                    <input type class="file-path validate"/>
                </div>
            </div>

            <div class="right-align">
                <a href="{{url()->previous()}}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
    </form>
    </section>


@endsection