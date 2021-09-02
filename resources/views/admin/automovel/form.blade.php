@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <form action ="{{$action}}" method="POST">

        
           
        @csrf
        @isset($automovel)
            @method('PUT')
        @endisset

        <div class="input-field">
            <input type="text" name="fabricante" id="fabricante" value="{{old('fabricante', $automovel->fabricante ?? '' )}}" />
            <label for="fabricante">Fabricante</label>
            @error('fabricante')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="modelo" id="modelo" value="{{old('modelo',$automovel->modelo ?? '' )}}" />
            <label for="modelo">Modelo</label>
            @error('modelo')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="cor" id="cor" value="{{old('cor', $automovel->cor ?? '' )}}" />
            <label for="cor">Cor</label>
            @error('cor')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>
                
        <div class="right-align">
            <a class="btn-flat waves-effect" href="{{route('admin.automovel.listar')}}">Cancelar</a>
            <button class= 'btn waves-effect waves-light' type="submit">
            SALVAR
            </button>

    
    </form>
</section>

@endsection