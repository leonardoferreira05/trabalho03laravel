@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class='section'>
    <form action="{{$action}}" method="POST">
        @csrf 

        
        <div class="input-field">
            <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}"/>
            <label for="titulo">Nome da Concessionaria</label>
            @error('titulo')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>


        <div class="input-field">
            <select name="automovel_id" id="automovel_id">
                <option value="" disabled selected>Selecione um automovel</option>

                @foreach ($automovel as $automovel)
                    <option value="{{$automovel->id}}">{{$automovel->modelo}}</option>
                @endforeach
            </select>
            <label for="automovel_id">Automovel</label>
            @error('automovel_id')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>


        <div class="input-field">
            <select name="tipo_id" id="tipo_id">
                <option value="" disabled selected>Selecione um tipo de automovel</option>

                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                @endforeach
            </select>
            <label for="tipo_id">Tipo de automovel</label>
            @error('tipo_id')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
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
            @error('finalidade_id')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>



        <div class="input-field">
            <input type="number" name="preco" id="preco" value="{{old('preco')}}"/>
            <label for="preco">Preço</label>
            @error('preco')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field col s12">
            <textarea name="descricao" id="descricao" class="materialize-textarea">{{old('descricao')}}</textarea>
            <label for="descricao">Descrição</label>
            @error('descricao')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field" col s5>
            <input type="text" name="rua" id="rua" value="{{old('rua')}}"/>
            <label for="rua">Rua</label>
            @error('rua')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field" col s3>
            <input type="text" name="bairro" id="bairro" value="{{old('bairro')}}"/>
            <label for="bairro">Bairro</label>
            @error('bairro')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field" col s2>
            <input type="number" name="numero" id="numero" value="{{old('numero')}}"/>
            <label for="numero">Número</label>
            @error('numero')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field" col s2>
            <input type="text" name="cidade" id="cidade" value="{{old('cidade')}}"/>
            <label for="cidade">Cidade</label>
            @error('cidade')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="input-field" col s2>
            <input type="text" name="estado" id="estado" value="{{old('estado')}}"/>
            <label for="estado">Estado</label>
            @error('estado')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
        </div>

        <div class="row">
            <div class="input-field" col s2>
                <select name="proximidades[]" id="proximidades" multiple>
                <option value="" disabled >Selecione uma proximidade</option>
                @foreach ($proximidades as $proximidade)
                    <option value="{{$proximidade->id}}">{{$proximidade->nome}}</option>
                @endforeach
                @error('proximidades')
            <span class="red-text text-accent-3">
                <small>{{$message}}</small>
            </span>
            @enderror
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