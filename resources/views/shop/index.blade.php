@extends('master')

@section('title', 'Shop')
@section('description', 'This is our shop page')

@section('styles')

@endsection

@section('content')




<h1>This is our shop page</h1>

<p><a href="/shop/AddProduct" class="btn btn-primary">Add New Product</a></p>

<div class="col-xs-12">

	{!!$allProducts->links()!!}

</div>

<?php if (count($allProducts) >0 ) : ?>

	@foreach($allProducts->chunk(3) as $productRow)
		<div class="row">
			<?php foreach ($productRow as $product) :?>

				<div class="col-sm-4 col-sm-12">
					<a href="shop/{{ $product->id }}">
						<div class="thumbnail">
							<h3> {{ $product->product_title }} </h3>
							<img class="responsive" src="/images/Products/{{$product->image}}">
							<p> {{ $product->product_description }}</p>
						</div>
					</a>
				</div>

			<?php endforeach;?>
		</div>
	@endforeach

<?php else :?>

	<p>There is no products in the database</p>

<?php endif;?>


@endsection

@section('scripts')

@endsection