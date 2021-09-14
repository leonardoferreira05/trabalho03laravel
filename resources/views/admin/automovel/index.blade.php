@extends('Admin.layouts.principal')

@section('conteudo-principal')

 <section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Fabricante</th>
                <th>Modelo</th>
                <th>Cor</th>
                <th class='right-align'>Opçoes</th>
            </tr>
        </thead>
        <body class=' light-green accent-1'>
            @forelse($automovel as $automovel)
                <tr>
                    <td>{{$automovel->fabricante}}</td>
                    <td>{{$automovel->modelo}}</td>
                    <td>{{$automovel->cor}}</td>
                    <td class='right-align'>
                       
                      <a href="{{route('admin.automovel.edit', $automovel->id)}}">
                        <span>
                            <i class="material-icons blue-text text-accent-2">edit</i>
                        </span>
                      </a>

                        <form action="{{route('admin.automovel.destroy',$automovel->id)}}" method="POST" style="display: inline;">
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
                    <td colsplan="2">Nao existem automoveis cadastrados.</td>
                </tr>
        </body>
            @endforelse
    </table>

    <div class= 'fixed-action-btn'>
        <a class= 'btn-floating btn-large waves-effect waves-light' href="{{route('admin.automovel.create')}}">
            <i class="large material-icons">add</i>
        
        </a>
    </div>
         
 
 </section>

@endsection