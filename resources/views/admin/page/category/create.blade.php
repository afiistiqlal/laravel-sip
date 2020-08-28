@extends('admin.admin')
@section('title')
Create Category
@endsection

@section('content')

<div class="row-md-12">
    <form action="store" method="POST">
    <div class="card">
        <h3>Add Category</h3>
        <div class="card-body">
            {{ csrf_field() }}
            <div class="form-group {{$errors->has('name') ? 'has-error':''}}"">
                <label for="inputName">Category</label>
                <input type="text" class="form-control" id="inputName" placeholder="Enter Category" name="name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control" id="inputStatus" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ URL::to('admin/category')}} " type="button" class="btn btn-outline-success">Back</a>
            <button type="submit" class="btn btn-primary float-right">Add Category</button>
        </div>
    </div> 
    </form>
</div>
@endsection