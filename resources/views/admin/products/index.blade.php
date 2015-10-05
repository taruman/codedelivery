@extends('app')

@section('content')

<div class='container'>
	<h3>Lista de Produtos</h3><br><br>

	<a class='btn btn-default' href="{{route('admin.products.create')}}">Novo Produto</a><br><br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Categoria</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->category->name }}</td>
				<td>
					<a class='btn btn-default btn-sm' href="{{route('admin.products.edit', ['id' => $product->id])}}">Editar</a>

					<a class='btn btn-danger btn-sm' href="{{route('admin.products.delete', ['id' => $product->id])}}">Deletar</a>
				</td>
			</tr>	
			@endforeach
		</tbody>	
	</table>
	{!! $products->render() !!}
</div>

@endsection