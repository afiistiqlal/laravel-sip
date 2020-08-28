@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>'product.store', 'files'=>true]) !!}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Product</h3>
                </div>
                <div class="card-body">
                    @if (!empty($errors->all()))
                    <div class="alert-danger alert">
                        {!! Html::ul($errors->all()) !!}
                    </div>
                        
                    @endif
                    <div class="row">
                        {{-- kolom kiri --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label("category_id", "Category") !!}
                                {!! Form::select("category_id", $categories, null, ["class"=>"form-control", "id"=>"category_id", "placeholder"=>"Choose Category"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label("name", "Name") !!}
                                {!! Form::text("name", null, ['class'=>'form-control', 'id'=>'name','placeholder'=>'Enter Name']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label("price", "Price") !!}
                                {!! Form::text("price", null, ['class'=>'form-control', 'id'=>'price','placeholder'=>'Product Price']) !!}
                            </div>
                        </div>
                        {{-- kolom kanan --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label("sku", "SKU") !!}
                                {!! Form::text("sku", null, ['class'=>'form-control', 'id'=>'sku','placeholder'=>'Enter SKU']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label("status", "Status") !!}
                                {!! Form::select("status", ['active'=>'Active', 'inactive'=>'Inactive'], null, ["class"=>"form-control", "id"=>"status", "placeholder"=>"Status"]) !!}
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
                                {!! Form::textarea("description", null, ['class'=>'form-control', 'id'=>'description', 'placeholder'=>'Enter Description']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('product.index')}}" class="btn btn-outline-info">Back</a>
                    {!! Form::submit("Save Product", ['class'=>'btn btn-primary float-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection