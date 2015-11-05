@extends('app')

@section('content')

<div class='container'>
	<h3>Editando {{$category->name}}</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => ['admin.categories.update', $category->id]]) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name' value='{{$category->name}}'>

		<input class="btn btn-danger" type="submit" value="Salvar">

	{!! Form::close() !!}
</div>

@endsection