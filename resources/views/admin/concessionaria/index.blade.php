@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class='section'>

<table class="highlight">
        <thead>
            <tr>
                <th>Concessionaria</th>
                <th>Carro</th>
                <th>Preço</th>
                <th class='right-align'>Opçoes</th>
            </tr>
        </thead>
        <body class=' light-green accent-1'>
            @forelse($concessionarias as $concessionaria)
                <tr>
                    <td>{{$concessionaria->titulo}}</td>
                    <td>{{$concessionaria->automovel->modelo}}</td>
                    <td>{{$concessionaria->preco}}</td>
                    <td class='right-align'>
                    
                    
                    <a href="{{route('admin.concessionaria.fotos.index', $concessionaria->id)}}">
                        <span>
                            <i class="material-icons green-text text-lighten-1">insert_photo</i>
                        </span>
                      </a>
                    
                    <a href="{{route('admin.concessionaria.show', $concessionaria->id)}}">
                        <span>
                            <i class="material-icons indigo-text text-accent-2">remove_red_eye</i>
                        </span>
                      </a>
                    
                    
                    <a href="{{route('admin.concessionaria.edit', $concessionaria->id)}}">
                        <span>
                            <i class="material-icons blue-text text-accent-2">edit</i>
                        </span>
                      </a>

                        <form action="{{route('admin.concessionaria.destroy',$concessionaria->id)}}" method="POST" style="display: inline;">
                            @csrf 
                            @method('DELETE')

                            <button style="border:0;background:transparent;" type="submit">
                        
                        <span style="cursor: pointer">
                            <i class="material-icons red-text text-accent-3">delete_forever</i>
                        </span>
                        </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colsplan="2">Nao existem concessionarias cadastradas.</td>
                </tr>
        </body>
            @endforelse
    </table>


<div class= 'fixed-action-btn'>
        <a class= 'btn-floating btn-large waves-effect waves-light' href="{{route('admin.concessionaria.create')}}">
            <i class="large material-icons">add</i>
        
        </a>
    </div>

</section>
@endsection