@extends('layouts.master')
@section('title','Product List')
@section('styles')
@endsection
@section('contents')
<h1 class="text-center">Product List</h1>
<div class="row">
	<div class="col-md-4 mt-4 mb-4">
		<div class="card">
			<form action="{{ url('/') }}" method="post">
				{{ csrf_field() }}
			  <div class="card-header">Product Type : 
	 		  	<select name="producttype" >
			  		<option value="cd">CD</option>
			  		<option value="book">BOOK</option>
			  	</select>
			  </div>
			  <div class="card-body">
			  	<div class="form-group">
			  		<input type="text" class="form-control" name="title" placeholder="Title">
			  	</div>
			  	<div class="form-group">
			  		<input type="text" class="form-control" name="fname" placeholder="First Name (Optional)">
			  	</div>
			  	<div class="form-group">
			  		<input type="text" class="form-control" name="sname" placeholder="Surname/Band">
			  	</div>
			  	<div class="form-group">
			  		<input type="number" class="form-control" name="price" placeholder="Price" min="0">
			  	</div>
			  	<div class="form-group">
			  		<input type="number" class="form-control" name="pages" placeholder="Pages/Play Length">
			  	</div>
			  </div>
			  <div class="card-footer">
			  	<button type="reset" class="btn btn-secondary">Cancel</button>
			  	<button type="submit" class="btn btn-secondary">Save</button>
			  </div>
			</form>		  
		</div>
	</div>
	@foreach($products as $product)
	<div class="col-md-4 mt-4 mb-4">
		<div class="card">
		  <div class="card-header">{{ $product->getType() }}</div>
		  <div class="card-body">
		  	<strong>{{ $product->getTitle() }}</strong>
		  	<p>{{ $product->getFullName() }}</p>
		  	<p>$ {{ $product->getPrice() }}</p>
		  	@if($product->getType()=="BOOK")
		  	<p>{{ "No of Pages : ".$product->getNumberOfPages() }}</p>
		  	@elseif($product->getType()=="CD")
		  	<p>{{ "Play Length : ".$product->getPlayLength() }}</p>

		  	@else
		  	@endif
		  </div>
		  <div class="card-footer">
		  	<a href="{{ url('/'.$product->getId()) }}" class="btn btn-secondary">Select</a>
		  </div>
		</div>
	</div>
	@endforeach
</div>

@endsection
@section('scripts')
@endsection
