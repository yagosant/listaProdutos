@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Produtos da marca</div>
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ver informações</th>
                            </tr>
                        </thead>            
                        <tbody>            
                            @foreach($marca->produtos as $produto)
                                <tr>
                                    <td>{{$produto->descricao}}</td>
                                    <td><a href="{{route('produto.detalhe', $produto->id)}}">
                                    Listar Produto</a></td>                               
                                </tr>                         
                            @endforeach                                 
                        </tbody>
                    </table> 
                </div> 
            </div>
    </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection