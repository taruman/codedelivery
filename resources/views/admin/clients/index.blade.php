@extends('app')

@section('content')

<div class='container'>
	<h3>Lista de Clientes</h3><br><br>

	<a class='btn btn-default' href="{{route('admin.clients.create')}}">Novo Cliente</a><br><br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clients as $client)
			<tr>
				<td>{{ $client->id }}</td>
				<td>{{ $client->user->name }}</td>
				<td>
					<a class='btn btn-default btn-sm' href="{{route('admin.clients.edit', ['id' => $client->id])}}">Editar</a>
				</td>
			</tr>	
			@endforeach
		</tbody>	
	</table>
	{!! $clients->render() !!}
</div>

@endsection