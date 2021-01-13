@extends('shared.base')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Edite a marca</h3></div>
        <div class="panel-body">
            <form method="post" action="{{route ('marca.atualizar', $marca->id)}}">  
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}          
                <h4>Dados do marca</h4>
                <hr>
                <div class="form-group">
                    <label for="descricao">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="nome" required value="{{$marca->nome}}">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
    </div>
@endsection