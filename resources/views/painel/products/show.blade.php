@extends('painel.templates.template')

@section('content')
<h1 class="title-pg">
	<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
	Produto: <b>{{$product->name}}</b>
</h1>
@if(isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
@endif

<p><b>Nome:			</b>{{$product->name}}</p>
<p><b>Numero:		</b>{{$product->number}}</p>
<p><b>Ativo:		</b>{{$product->active}}</p>
<p><b>Categoria:	</b>{{$product->category}}</p>
<p><b>Descrição:	</b>{{$product->description}}</p>

<hr>
<form method="POST" action="{{route('produtos.update', $product->id)}}">
{{ csrf_field() }}
{{ method_field('DELETE') }}
<input  type="submit" value="Deletar" class="btn btn-danger" title="Deletar">
</form>
@endsection