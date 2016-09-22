@extends('master')

@section('title', 'Checkout')
@section('description', 'Checkout Page')

@section('styles')

@endsection

@section('content')
	<div class="col-xs-12">
		<h1 class="text-center">Checkout for {{ \Auth::user()->name }}</h1>	

		@if ( count($Cart) > 0 )

			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:50%">Product</th>
						<th style="width:20%">Price</th>
						<th style="width:10%">Quantity</th>
						<th style="width:20%">Subtotal</th>

					</tr>
				</thead>
				<tbody>
					@foreach($Cart as $CartRow)
						
						<tr>
							<td><a href="/shop/{{ $CartRow->product_id }}">{{ $CartRow->product->product_title}}</a> - Size {{ $CartRow->size }} </td>
							<td>{{ $CartRow->product->price 	}}</td>
							<td>{{ $CartRow->quantity }}</td>
							<td>{{ $CartRow->subtotal }}</td>
						</tr>
					@endforeach
					<tr>
						<td></td>
						<td><strong>Grandtotal</strong></td>
						<td><strong>${{ $Grandtotal }}</strong></td>
						<td></td>
					</tr>
				</tbody>				
			</table>


		@endif

	</div>
@endsection

@section('scripts')

@endsection