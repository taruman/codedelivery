@extends('app')

@section('content')

<div class='container'>
	<h3>Novo Produto</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => 'admin.products.store']) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name' value="{{old('name')}}">

		<label>Descrição</label>
		<textarea class="form-control" name='description'>{{old('description')}}</textarea>

		<label>Preço</label>
		<input class="form-control" type="text" name='price' value="{{old('price')}}">

		<label>Categoria</label>
		<select class="form-control"name='category_id'>
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</select>

		<input class="btn btn-danger" type="submit" value="Enviar">

	{!! Form::close() !!}
</div>

@endsection