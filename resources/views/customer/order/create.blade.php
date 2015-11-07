@extends('app')

@section('content')

<div class='container'>

	@if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['class' => 'form', 'route' => 'customer.order.store']) !!}

		<div class="form-group">
			<label>Total</label>
			<p id="total"></p>
			<a href="#" id="btnNewItem" class="btn btn-default">Novo Item</a>

			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Produto</td>
						<td>Quantidade</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select class="form-control" name="items[0][product_id]">
								@foreach($products as $product)
									<option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->name}} --- {{$product->price}}</option>
								@endforeach
							</select>
						</td>
						<td>
							<input name="items[0][qtd]" value="1" class="form-control">
						</td>
					</tr>
				</tbody>
			</table>

			<button type="submit" class="btn btn-success">Comprar</button>
		</div>

	{!! Form::close() !!}
</div>

@endsection

@section('post-script')

<script type="text/javascript">
	$("#btnNewItem").click(function(){
		var row = $('table tbody > tr:last'),
			newRow = row.clone(),
			length = $('table tbody tr').length;

		newRow.find('td').each(function(){
			var td = $(this),
				input = td.find('input, select'),
				name = input.attr('name');

			input.attr('name', name.replace((length - 1) + "", length + ""));
		});

		newRow.find("input").val(1);
		newRow.insertAfter(row);
		calculateTotal();
	});

	$(document).on("change", "select", function(){
		calculateTotal();
	});

	$(document).on("blur", "input", function(){
		calculateTotal();
	});

	function calculateTotal(){
		var total = 0,
			trLen = $('table tbody tr').length,
			tr = null,
			price,
			qtd;

		for (var i = 0; i < trLen; i++) {
			tr = $('table tbody tr').eq(i);
			price = tr.find(":selected").data("price");
			qtd = tr.find('input').val();
			total += price * qtd;
		};

		$('#total').html(total);
	};
</script>

@endsection