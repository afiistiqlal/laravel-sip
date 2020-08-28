@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Transaction</h2>
                    <div class="card-tools">
                        <a href="{{URL::to('admin/transaction/create')}} ">
                        import</a>
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button class="close" type="button" data-dissmiss="alert" aria-hidden="true">x</button>
                        </div>
                        {{session('message')}}
                    @endif    

                    @if (count($transaction) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $trs)
                                    <tr>
                                        <td>{{ $loop->iteration}} </td>
                                        <td>{{ $trs->product->name}} </td>
                                        <td>{{ $trs->date_transaction()}} </td>
                                        <td>{{ $trs->price}} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            <h3>Belum ada data</h3>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-2">
                            
                        </div>
                                <div class="col-md-8">
                                    {{ $transaction->links() }}
                                </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection