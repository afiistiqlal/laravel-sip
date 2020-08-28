@extends('admin.admin')
@section('title')
    Category List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                        @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                            {{session('idcat')}}
                            <a href="{{URL::to('admin/category/continue-destroy/'.session('idcat'))}} " 
                            class="btn btn-outline-warning">Continue Delete?</a>
                        </div>
                        @endif
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Category</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="/admin/category/create" class="btn btn-primary float-right">Create</a>
                            {{-- <a href="/admin/category/create"></a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <th>
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">Name</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">action</td>
                            </tr>
                        </th>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">{{ $loop->iteration}} </td>
                                <td class="text-center">{{ $category->name}} </td>
                                <td class="text-center">{{ $category->status}} </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ URL::to('/admin/category/'.$category['id']) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="{{ URL::to('/admin/category/'.$category['id']) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-success" href="{{ URL::to('/admin/category/'.$category['id'].'/edit') }}"><i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
