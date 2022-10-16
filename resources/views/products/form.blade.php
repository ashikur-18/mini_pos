@extends('layout.main')

@section('main_content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(isset($product))
        <h2>Update Information</h2>
    @else
        <h2>Add New product</h2>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New product</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
	    		<div class="col-md-8">
                    
                    @if(isset($product))
	    				{!! Form::model($product, [ 'route' => ['products.update', $product->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!}	
	    			@endif

                        
					    <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label text-right">Title<span class="text-danger">*</span></label>
                             <div class="col-sm-10">
                                {{ Form::text('title', NULL,['class' => 'form-control','id'=> 'title','placeholder'=>'Title'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label text-right">Description<span class="text-danger">*</span></label>
                             <div class="col-sm-10">
                                {{ Form::textarea('description', NULL,['class' => 'form-control','id'=> 'description','placeholder'=>'Description'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label text-right">Category<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                {{ Form::select('category_id', $categories, NULL, [ 'class'=>'form-control', 'id' => 'group', 'placeholder' => 'Select Category' ]) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-2 col-form-label text-right">Cost price<span class="text-danger">*</span></label>
                             <div class="col-sm-10">
                                {{ Form::text('cost_price', NULL,['class' => 'form-control','id'=> 'cost_price','placeholder'=>'Cost price'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label text-right">Sale Price</label>
                             <div class="col-sm-10">
                                {{ Form::text('price', NULL,['class' => 'form-control','id'=> 'price','placeholder'=>'Sale Price'])}}
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="price" class="col-sm-2 col-form-label text-right"></label>
                             <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
	    		</div>
	    	</div>
        </div>
    </div>
@stop