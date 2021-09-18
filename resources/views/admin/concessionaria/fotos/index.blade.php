@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{$concessionaria->titulo}}</h4>

    <section class="section">

    <div class="flex-container">
        @forelse ($fotos as $foto)
            <div class="flex-item">
                <img src="{{asset("storage/$foto->url")}}" width="200" height="150" />
            </div>
        @empty
            <div>Não existem fotos para esse automovel</div>
        @endforelse

             </div>

        <div class= 'fixed-action-btn'>
        <a class= 'btn-floating btn-large waves-effect waves-light' href="{{route('admin.concessionaria.fotos.create',$concessionaria->id)}}">
            <i class="large material-icons">add</i>
        
        </a>
    </div>


    </section>


@endsection