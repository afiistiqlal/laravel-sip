@extends('admin.admin')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="Card-title">Sales Graph</h3>
                </div>
                <div class="card-body">
                    <canvas class="chart" id="sales-chart-id" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="Card-title">Latest Transaction<h3>
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
                        <div class="col-md-3">
                        </div>
                            <div class="col-md-6">
                                {{ $transaction->links() }}
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var chart = document.getElementById("sales-chart-id").getContext('2d');
        var grafik = new Chart(
            chart, {
                type : 'line',
                data: {
                    labels : {!! json_encode($data['months']) !!},
                    datasets : [{
                    label : "Sales Grafik",
                    data : {!!json_encode($data['data'])!!},
                }]

                }
            }
        )
    </script>
@endsection