@extends('app')

@section('content')

<div class='container'>
	<h3>Novo Cliente</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => 'admin.clients.store']) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name'>

		<label>Email</label>
		<input class="form-control" type="text" name='email'>

		<label>Telefone</label>
		<input class="form-control" type="text" name='phone'>

		<label>Endereço</label>
		<input class="form-control" type="text" name='address'>

		<label>Cidade</label>
		<input class="form-control" type="text" name='city'>

		<label>Estado</label>
		<input class="form-control" type="text" name='state'>

		<label>CEP</label>
		<input class="form-control" type="text" name='zipcode'>

		<input class="btn btn-danger" type="submit" value="Enviar">

	{!! Form::close() !!}
</div>

@endsection