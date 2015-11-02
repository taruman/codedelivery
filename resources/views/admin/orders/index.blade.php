@extends('app')

@section('content')

<div class='container'>
	<h3>Pedidos</h3><br><br>

	<a class='btn btn-default' href="#">Novo Pedido</a><br><br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Id</th>
				<th>Total</th>
				<th>Data</th>
				<th>Itens</th>
				<th>Entregador</th>
				<th>Status</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->id }}</td>
				<td>{{$order->total}}</td>
				<td>{{$order->created_at}}</td>
				<td>
				@foreach($order->items as $item)
					{{$item->product->name}}<br>
				@endforeach
				</td>
				@if(isset($order->deliveryman->name))
				<td>{{$order->deliveryman->name}}</td>
				@else
				<td>-</td>
				@endif
				<td>{{$order->status}}</td>
				<td>
					<a class='btn btn-default btn-sm' href="{{route('admin.orders.edit', ['id' => $order->id])}}">Editar</a>
				</td>
			</tr>	
			@endforeach
		</tbody>	
	</table>
	{!! $orders->render() !!}
</div>

@endsection