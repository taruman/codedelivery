@extends('app')

@section('content')

<div class='container'>
	{!! Form::open(['route' => 'admin.categories.store']) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name'>

		<input class="btn btn-danger" type="submit" value="Enviar">

	{!! Form::close() !!}
</div>

@endsection