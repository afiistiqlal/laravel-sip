@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="card-tools">
                        <h3 class="card-title">
                            List Product
                        </h3> 
                        <a href="{{ URL::to('admin/product/create')}}" class="btn btn-tools">
                            <i class="fas fa-plus">
                            </i>
                            Add
                        </a>
                            
                        </div>
                        <div class="card-tools">
                        <a href="{{URL::to('product/export')}} ">
                            Export</a>
                        <i class="fas fa-file-export"></i>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session('message')}}
                        </div>
                    @endif
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label("category", "Category") !!}
                                    {!! Form::select("category", $categories, $cat_id, ['class'=>'form-control', 'placeholder'=>'All Category', 'id'=>'category']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label("search", "Search") !!}
                                    {!! Form::text("search", $keyword, ['class'=>'form-control', 'id'=>'search', 'placeholder'=>'Keyword']) !!}
                                </div>
                            </div>
                        </div>

                    @if (count($products) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">SKU</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}} </td>
                                        <td class="text-center">{{$product->category->name }} </td>
                                        <td class="text-center">{{ $product->name}} </td>
                                            <td class="text-center">{{ $product->price}} </td>
                                            <td class="text-center">{{ $product->sku}} </td>
                                            <td class="text-center"><img src="{{ asset('storage/'.$product->image)}}" alt="" width='100'>  </td>
                                            <td class="text-center">{{ $product->status}} </td>
                                            <td class="text-center">
                                                <form method="POST" action="{{ URL::to('/admin/product/'.$product['id']) }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" href="{{ URL::to('/admin/product/'.$product['id']) }}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-success" href="{{ URL::to('/admin/product/'.$product['id'].'/edit') }}"><i class="fas fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>   
                                </table>
                            </div>
                        </div>
                        
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    {{$products->appends($_GET)->links()}}
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#category').on('change', function(){
            filter();
        });

        $('#search').keypress(function(event){
            if (event.keyCode == 13) {
               filter();
            }
        });

        function filter(){
            var catId = $('#category').val();
            var keyword = $('#search').val();

            window.location.replace("{{ URL::to('admin/product')}}?cat_id="+catId+"&keyword="+keyword);
        }
    </script>
@endsection