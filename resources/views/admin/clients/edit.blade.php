@extends('app')

@section('content')

<div class='container'>
	<h3>Editando {{$client->user->name}}</h3>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => ['admin.clients.update', $client->id]]) !!}

		<label>Nome</label>
		<input class="form-control" type="text" name='name' value='{{$client->user->name}}'>

		<label>Email</label>
		<input class="form-control" type="text" name='email' value='{{$client->user->email}}'>

		<label>Telefone</label>
		<input class="form-control" type="text" name='phone' value='{{$client->phone}}'>

		<label>Endereço</label>
		<input class="form-control" type="text" name='address' value='{{$client->address}}'>

		<label>Cidade</label>
		<input class="form-control" type="text" name='city' value='{{$client->city}}'>

		<label>Estado</label>
		<input class="form-control" type="text" name='state' value='{{$client->state}}'>

		<label>CEP</label>
		<input class="form-control" type="text" name='zipcode' value='{{$client->zipcode}}'>

		<input class="btn btn-danger" type="submit" value="Salvar">

	{!! Form::close() !!}
</div>

@endsection