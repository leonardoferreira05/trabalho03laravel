@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class='section'>
    <form action="{{$action}}" method="POST">
        @csrf 

        
        <div class="input-field">
            <input type="text" name="titulo" id="titulo"/>
            <label for="titulo">Titulo</label>
        </div>


        <div class="input-field">
            <select name="cidade_id" id="cidade_id">
                <option value="" disabled selected>Selecione um automovel</option>

                @foreach ($concessionarias as $concessionaria)
                    <option value="{{$concessionaria->id}}">{{$concessionaria->nome}}</option>
                @endforeach
            </select>
            <label for="cidade_id">Concessionaria</label>
        </div>


        <div class="input-field">
            <select name="tipo_id" id="tipo_id">
                <option value="" disabled selected>Selecione um automovel</option>

                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                @endforeach
            </select>
            <label for="tipo_id">Tipo de automovel</label>
        </div>

        <div>
             @foreach ($finalidades as $finalidade)
                <span>
                    <label style="margin-right: 30px">
                        <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap"
                        value="{{$finalidade->id}}"/>
                        <span>{{$finalidade->nome}}</span>
                    </label>
                </span>    
            @endforeach
        </div>



        <div class="input-field">
            <input type="number" name="preco" id="preco"/>
            <label for="preco">Preço</label>
        </div>

        <div class="input-field col s12">
            <textarea name="descricao" id="descricao" class="materialize-textarea"></textarea>
            <label for="descricao">Descrição</label>
        </div>



    </form>

</section>
@endsection