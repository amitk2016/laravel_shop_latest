@extends('master')

@section('title', 'Edit Product')
@section('description', 'Editing product')

@section('styles')

@endsection

@section('content')

	{!! Form::model($product,['action' => ['ShopController@update',$product->id],'files'=> true ]) !!}

	<div class="col-xs-12">

		<p>
			<a class="btn btn-danger" href="/shop/{{$product->id}}">Cancel</a>
			{{Form::submit('Save Changes',["class" => 'btn btn-success']) }}
		</p>
		
	</div>





	<div class="col-md-6 col-xs-12">

		<img src="/images/Products/{{$product->image}}" class="img-responsive" >

		<div class="form-group">
			{{ Form::label('image','Choose an Image') }}
			{{ Form::file('image',['class'=>'form-control']) }}
		</div>
	</div>
	
	<div class="col-md-6 col-xs-12">

		<div class="form-group">
			{{ Form::label('product_title','Product Title')}}
			{{ Form::text('product_title',null,['class' => 'form-control ']) }}
		</div>

		<div class="form-group">
			{{ Form::label('price','Product Price')}}
			{{ Form::text('price',null,['class' => 'form-control input-lg']) }}
		</div>

		<div class="form-group">
			{{ Form::label('product_description','Product Description')}}
			{{ Form::textarea('product_description',null,['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('quantity','Quantity')}}
			{{ Form::text('quantity',null,['class' => 'form-control input-lg']) }}
		</div>


		{{-- <h1>{{$product->product_title}}</h1>
		<h2>{{$product->price}}</h2>
		<p>{{$product->product_description}}</p> --}}
	</div>

		{{-- <form>
			<select name="size">
				<option value="">Choose a Size</option>
				<option value="xs">Extra Small</option>
				<option value="sm">Small</option>
				<option value="md">Medium</option>
				<option value="lg">Large</option>
				<option value="xl">Extra Large</option>
		</select>

		<div class="form-group">
			<input class="form-control" type="number" name="quantity" min="0" max="10">
		</div>
		
		<button type="submit" class="btn">Add to cart</button>
		</form> --}}

{!!Form::close()!!}
@endsection

@section('scripts')

@endsection