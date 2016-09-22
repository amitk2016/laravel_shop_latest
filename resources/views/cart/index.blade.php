@extends('master')

@section('title', 'Cart')
@section('description', 'This is Cart Page')

@section('styles')

	<style>

	 h1{
	 	color:#eb5e28;
	 	text-align: center;
	 	margin-bottom: 30px;
	 }
	 table{
	 	background-color:#eee;
	 }
	 thead{
	 	font-weight:bold; 
	 	font-size:16px;
	 }
	 tfoot{
	 	font-weight:bold; 
	 	font-size:16px;
	 }


	</style>

@endsection

@section('content')

<h1>This is Our Shopping Cart for {{ \Auth::user()->name }}</h1>

	@if ( count($Cart) > 0 )

		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:50%">Product</th>
					<th style="width:10%">Price</th>
					<th style="width:10%">Quantity</th>
					<th style="width:20%">Subtotal</th>
					<th style="width:10%"></th>

				</tr>
			</thead>
			<tbody>
				@foreach($Cart as $CartRow)
					
					<tr>
						<td><a href="/shop/{{ $CartRow->product_id }}">{{ $CartRow->product->product_title}}</a> - Size {{ $CartRow->size }} </td>
						<td>{{ $CartRow->product->price 	}}</td>
						<td>{{ $CartRow->quantity }}</td>
						<td>{{ $CartRow->subtotal }}</td>
						<td><a href="/cart/Remove/{{ $CartRow->id }}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td><strong>Grandtotal</strong></td>
					<td><strong>${{ $Grandtotal }}</strong></td>
					<td></td>
				</tr>
			</tbody>


				<tfoot>
					<tr>
						<td><a href="/shop" class="btn btn-warning">Continue Shopping</a></td>
						<td></td>
						<td></td>
						<td></td>
						<td><a href="/Checkout/{{ \Auth::user()->id }}" class="btn btn-success">Checkout</a></td>
					</tr>
				</tfoot>
						

		</table>

	@else

			<p>Your Shopping Cart is Empty</p>

	@endif


@endsection

@section('scripts')
	
@endsection