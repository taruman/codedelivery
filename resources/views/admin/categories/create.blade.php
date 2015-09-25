@extends('app')

@section('content')

<div class='container'>
	<h3>Nova Categoria</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => 'admin.categories.store']) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name'>

		<input class="btn btn-danger" type="submit" value="Enviar">

	{!! Form::close() !!}
</div>

@endsection