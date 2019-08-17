@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
	<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
	Gestão de Produtos: <b>{{$product->name or 'Novo'}}</b>
</h1>

{{-- tratamento de erro  --}}

@if(isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
@endif

@if(isset($product))
	<form class="form" method="post" action="{{route('produtos.update', $product->id)}}">
		{!! method_field('PUT') !!}
@else
	<form class="form" method="post" action="{{route('produtos.store')}}">
@endif
	{!! csrf_field() !!}
	<div class="form-group">
		<input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name or old('name')}}">
	</div>
	<div class="form-group">
		<label>
			<input type="checkbox" name="active" value="1" 
		      	@if( isset($product) && $product->active == '1' ) checked 
		      		@else
			      	@if(old('active') == '1') checked 
			      	@endif 
		      	@endif> Ativo ?
		</label>
	</div>
	<div class="form-group">
		<input type="text" name="number" placeholder="Numero:" class="form-control" value="{{$product->number or old('number')}}">
	</div>
	<div class="form-group">
		<select name="category" class="form-control">
			<option value="0">Escolha sua categoria</option>
			@foreach($categorys as $category)
				<option value="{{$category}}"
				    @if( isset( $product ) && $product->category == $category )
				     selected
				    @else
				     {{old('category') == $category  ? 'selected="selected"': ''}}
				    @endif   
				    >{{$category}}
			   </option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<textarea name="description" placeholder="Descrição">{{$product->description or old('description')}}</textarea></br>
	</div>
	<button class="btn btn-primary">Enviar</button>
</form>


@endsection