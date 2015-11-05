@extends('app')

@section('content')

<div class='container'>
	<h3>Lista de Cupoms</h3><br><br>

	<a class='btn btn-default' href="{{route('admin.cupoms.create')}}">Novo Cupom</a><br><br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Id</th>
				<th>Valor</th>
				<th>Código</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cupoms as $cupom)
			<tr>
				<td>{{ $cupom->id }}</td>
				<td>{{ $cupom->value }}</td>
				<td>{{ $cupom->code }}</td>
				<td>
					<a class='btn btn-default btn-sm' href="{{route('admin.cupoms.edit', ['id' => $cupom->id])}}">Editar</a>
				</td>
			</tr>	
			@endforeach
		</tbody>	
	</table>
	{!! $cupoms->render() !!}
</div>

@endsection