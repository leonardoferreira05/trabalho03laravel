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

        <div class="input-field" col s5>
            <input type="text" name="rua" id="rua"/>
            <label for="rua">Rua</label>
        </div>

        <div class="input-field" col s3>
            <input type="text" name="bairro" id="bairro"/>
            <label for="bairro">Bairro</label>
        </div>

        <div class="input-field" col s2>
            <input type="number" name="numero" id="numero"/>
            <label for="numero">Número</label>
        </div>

        <div class="input-field" col s2>
            <input type="text" name="cidade" id="cidade"/>
            <label for="cidade">Cidade</label>
        </div>

        <div class="input-field" col s2>
            <input type="text" name="estado" id="estado"/>
            <label for="estado">Estado</label>
        </div>

        <div class="row">
            <div class="input-field" col s2>
                <select name="proximidades[]" id="proximidades" multiple>
                <option value="" disabled >Selecione uma proximidade</option>
                @foreach ($proximidades as $proximidade)
                    <option value="{{$proximidade->id}}">{{$proximidade->nome}}</option>
                @endforeach
                </select>
            </div>
        </div>



        <div class="right-align">
            <a class="btn-flat waves-effect" href="{{route('admin.concessionaria.index')}}">Cancelar</a>
            <button class= 'btn waves-effect waves-light' type="submit">
            SALVAR
            </button>
        </div>

    </form>

</section>
@endsection