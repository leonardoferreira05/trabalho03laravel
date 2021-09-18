@extends('admin.layouts.principal')

@section('conteudo-principal')

<h4>{{$concessionaria->titulo}}</h4>
<section class="section">
    <div class="row">
        <span class="col s12">
            <h5>Descrição</h5>
            <p>{{$concessionaria->descricao}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Automovel</h5>
            <p>{{$concessionaria->automovel->modelo}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Concessionaria</h5>
            <p>{{$concessionaria->titulo}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Tipo de Automovel</h5>
            <p>{{$concessionaria->tipo->nome}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>finalidade</h5>
            <p>{{$concessionaria->finalidade->nome}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s4">
            <h5>Preço</h5>
            <p>{{$concessionaria->preco}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s4">
            <h5>Cidade</h5>
            <p>{{$concessionaria->endereco->cidade}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s4">
            <h5>Estado</h5>
            <p>{{$concessionaria->endereco->estado}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Rua</h5>
            <p>{{$concessionaria->endereco->rua}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Bairro</h5>
            <p>{{$concessionaria->endereco->bairro}}</p>
        </span>
    </div>
</section>


@endsection