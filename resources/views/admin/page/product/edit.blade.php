@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>['product.update', $product->id], 'files'=>true, 'method'=>'PUT']) !!}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                @if (!empty($errors->all()))
                                <div class="alert-danger alert">
                                    {!! Html::ul($errors->all()) !!}
                                </div>
                                    
                                @endif
                                <img src="{{asset('storage/'.$product->image)}}" alt="" width="30%" height="30%">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        {!! Form::label("category_id", "Category") !!}
                                        {!! Form::select("category_id", $categories, $product->category->id, ["class"=>"form-control" , 'placeholder'=>'Choose Categories']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("name", "Name") !!}
                                        {!! Form::text("name", $product->name, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("price", "Price") !!}
                                        {!! Form::text("price", $product->price, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("sku", "SKU") !!}
                                        {!! Form::text("sku", $product->sku, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("status", "Status") !!}
                                        {!! Form::select("status", ['active'=>'Active', 'inactive'=>'Inactive'], $product->status, ["class"=>"form-control", 'placeholder'=>'Choose Status']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("image", "Image") !!}
                                        {!! Form::file("image", ["class"=>"form-control-file"]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("description", "Description") !!}
                                        {!! Form::text("description", $product->description, ["class"=>"form-control"]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('product.index')}}" class="btn btn-outline-info">Back</a>
                    {!! Form::submit("Update Product", ['class'=>'btn btn-primary float-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection