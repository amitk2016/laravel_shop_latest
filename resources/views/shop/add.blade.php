@extends('master')

@section('title', 'Add New Product')
@section('description', 'We will be adding new product')

@section('styles')
	<style type="text/css">

		textarea {
			resize:none;
		}
	</style>

@endsection

@section('content')




<h1>Add New Product</h1>

<form id="add-product" method="post" enctype="multipart/form-data" action="/submit-product">
	{!! csrf_field() !!}



	<div class="form-group {{ $errors->has('product_title') ? 'has-error' : '' }} ">
		<label>Product Title</label>
		<input type="text" class="form-control" name="product_title" placeholder="Product Title" value="{{ old ('product_title') }}">
		{!! $errors->first('product_title','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('product_description') ? 'has-error' :'' }} " >
		<label>Product Description</label>
		<textarea class="form-control" name="product_description" placeholder="Product Description" rows="5"></textarea>
		{!! $errors->first('product_description','<span class="help-block">:message</span>') !!}
	</div>

  	<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}" style="width:300px;" value="{{ old ('amount') }}">
    	<label for="exampleInputAmount">Price :</label>
	    <div class="input-group">
	      <div class="input-group-addon">$</div>
	      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="amount">
	      {{-- <div class="input-group-addon">.00</div> --}}
	    </div>
	    {!! $errors->first('amount','<span class="help-block">:message</span>') !!}
  	</div>

  	<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}" style="width:300px;">
		<label>Quantity :</label>
		<input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{ old ('quantity') }}">
		{!! $errors->first('quantity','<span class="help-block">:message</span>') !!}
	</div>

	<div class="form-group " >
	    <label for="exampleInputFile">File input</label>
	    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
	    <small id="fileHelp" class="form-text text-muted">Required an image</small>
  	</div>



	<div class="form-group">
		<button type="submit" class="btn btn-primary">Add Product</button>
	</div>

</form>

@if(count($errors))
 	<ul>
 		@foreach($errors->all() as $error)
 	<li>{{ $error }}</li>
 		@endforeach
 	</ul>
 @endif


@endsection

@section('scripts')

@endsection