@extends('layouts.master')
@section('title','Edit/Delete Product')
@section('styles')
@endsection
@section('contents')
<h1 class="text-center">Edit / Delete Product</h1>
@if($errors->any())
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <ul>
  	@foreach($errors->all() as $error)
  	<li>{{ $error }}</li>
  	@endforeach
  </ul>
</div>
@endif
<div class="row">
	
	<div class="col-md-4 offset-md-4 mt-4 mb-4">
		<div class="card">
			<form action="{{ url('/'.$product->getId()) }}" method="post">
				{{ csrf_field() }}
			  	{{ method_field('PUT') }}
			  <div class="card-header">{{ $product->getType() }}</div>
			  <div class="card-body">
			  	<div class="form-group">
			  		<input type="text" class="form-control" name="title" placeholder="Title" value="{{ $product->getTitle() }}">
			  	</div>
			  	<div class="form-group">
			  		<input type="text" class="form-control" name="fname" placeholder="First Name (Optional)" value="{{ $product->getFirstname() }}">
			  	</div>
			  	<div class="form-group">
			  		<input type="text" class="form-control" name="sname" placeholder="Surname/Band" value="{{ $product->getMainname() }}">
			  	</div>
			  	<div class="form-group">
			  		<input type="number" class="form-control" name="price" placeholder="Price" min="0" value="{{ $product->getPrice() }}"> 
			  	</div>
			  	<div class="form-group">
			  		<input type="number" class="form-control" name="pages" placeholder="Pages/Play Length" value="{{ $product->getType()=='BOOK'?$product->getNumberOfPages():$product->getPlayLength() }}">
			  	</div>
			  	
			  	
			  	
			  	
			  	
			  </div>
			  <div class="card-footer">
			  	<button type="reset" class="btn btn-secondary">Cancel</button>
			  	<button type="submit" class="btn btn-secondary">Update</button>
			  	
			  	<button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#deleteProductModal" >Delete</button>
			  </div>
			</form>		  
		</div>
	</div>
</div>
<!-- The Modal -->
<div class="modal" id="deleteProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="{{ url('/'.$product->getId()) }}" method="post">
			{{ csrf_field() }}
		  	{{ method_field('DELETE') }}
		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Delete Product</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        Are you sure you want to delete this product?
		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-danger">Delete</button>
		      </div>
		  </form>

    </div>
  </div>
</div>
@endsection
@section('scripts')
@endsection
