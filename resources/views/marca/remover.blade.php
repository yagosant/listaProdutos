@extends('shared.base')
@section('content')
@if(Session::has('mensagem'))
	<div class="row">
	<div class="col-md-12">
		<div class="alert alert-warning">
		<div align="center">
			{{ Session::get('mensagem')['msg'] }}
		</div>
		</div>
		</div>
	</div>        
@endif 
<div class="panel panel-default">
      <div class="panel-heading">Remover a marca</div>
		<div class="panel-body">
			<form method="post" action="{{route ('marcas.deletar', $marca->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<h4>Tem certeza que deseja remover a marca?</h4>
						<hr>
						<h4>Sobre a marca</h4>
						<p>Nome: {{$marca->nome}}</p>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Remover</button>
				<a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</div>
@endsection