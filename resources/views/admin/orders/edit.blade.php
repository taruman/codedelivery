@extends('app')

@section('content')

	<div class="container">
		<h3>Pedido #{{$order->id}} - R${{$order->total}}</h3>
		<h4>Cliente: {{$order->client->name}}</h4>
		<h4>Data: {{$order->created_at}}</h4>
		<p>Entregar em: {{$order->client->client->address}} - {{$order->client->client->state}}</p>
	</div>

	<div class='container'>
		@if($errors->any())
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['route' => ['admin.orders.update', $order->id]]) !!}

			<label>Entregador</label>
			<select class="form-control"name='user_deliveryman_id'>
				@foreach($deliverymen as $deliveryman)
					<option value="{{$deliveryman->id}}">{{$deliveryman->name}}</option>
				@endforeach
			</select>

			<label>Status</label>
			<select class="form-control"name='status'>
				<option value="1">Pendente</option>
				<option value="2">A caminho</option>
				<option value="3">Entregue</option>
			</select>

			<input class="btn btn-danger" type="submit" value="Editar">

		{!! Form::close() !!}
	</div>

@endsection