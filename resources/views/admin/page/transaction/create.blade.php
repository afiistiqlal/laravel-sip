@extends('admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['url' => 'admin/transaction/import', 'files'=> true]) !!}
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Import Transaction</h2>
                </div>
                <div class="card-body">
                    <div class="custom-file">
                        {!! Form::file('excel', ['class'=> 'custom-file-input']) !!}
                        {!! Form::label('excel', 'Excel File', ['class'=>'custom-file-label']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{URL::to('admin/transaction')}} " class="btn btn-outline-success">Back</a>
                    {!! Form::submit('Import', ['class'=>'btn btn-primary float-right']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection