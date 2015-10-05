@extends('app')

@section('content')

<div class='container'>
	<h3>Editando {{$product->name}}</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => ['admin.products.update', $product->id]]) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name' value='{{$product->name}}'>

		<label>Descrição</label>
		<textarea class="form-control" name='description'>{{$product->description}}</textarea>

		<label>Preço</label>
		<input class="form-control" type="text" name='price' value="{{$product->price}}">

		<label>Categoria</label>
		<select class="form-control"name='category_id'>
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</select>

		<input class="btn btn-danger" type="submit" value="Salvar">

	{!! Form::close() !!}
</div>

@endsection