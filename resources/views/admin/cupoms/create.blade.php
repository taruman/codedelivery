@extends('app')

@section('content')

<div class='container'>
	<h3>Novo Cupom</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => 'admin.cupoms.store']) !!}

		<label>Código</label>
		<input class="form-control" type="text" name='code'>

		<label>Valor</label>
		<input class="form-control" type="text" name='value'>

		<input class="btn btn-danger" type="submit" value="Enviar">

	{!! Form::close() !!}
</div>

@endsection