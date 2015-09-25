@extends('app')

@section('content')

<div class='container'>
	<a href="#">Nova Categoria</a><br><br>

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
				<td></td>
			</tr>	
			@endforeach
		</tbody>	
	</table>
	{!! $categories->render() !!}
</div>

@endsection