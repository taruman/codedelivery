@extends('app')

@section('content')

<div class='container'>
	<h3>Lista de Categorias</h3><br><br>

	<a class='btn btn-default' href="{{route('admin.categories.create')}}">Nova Categoria</a><br><br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>
					<a class='btn btn-default btn-sm' href="{{route('admin.categories.edit', ['id' => $category->id])}}">Editar</a>
				</td>
			</tr>	
			@endforeach
		</tbody>	
	</table>
	{!! $categories->render() !!}
</div>

@endsection