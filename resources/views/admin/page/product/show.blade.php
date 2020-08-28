@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Product</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                @if (!is_null($product->image))
                                    <img src="{{asset('storage/'.$product->image)}} " alt="" width="30%" height="30%">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        {!! Form::label("category_id", "Category") !!}
                                        {!! Form::text("category", $product->category->name, ["class"=>"form-control", 'disabled']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("name", "Name") !!}
                                        {!! Form::text("name", $product->name, ['class'=>'form-control', 'disabled']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("price", "Price") !!}
                                        {!! Form::text("price", $product->price, ['class'=>'form-control', 'disabled']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("sku", "SKU") !!}
                                        {!! Form::text("sku", $product->sku, ['class'=>'form-control', 'disabled']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label("status", "Status") !!}
                                        {!! Form::text("status", $product->status, ["class"=>"form-control", 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("description", "Description") !!}
                                        {!! Form::text("description", $product->description, ["class"=>"form-control", 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection