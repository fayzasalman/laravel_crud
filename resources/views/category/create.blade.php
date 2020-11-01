@extends('layouts.app')

@section('content')
<div class="container mt-2">
  
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class=" mb-2">
            <h2>Add a new Product Category</h2>
        </div>
        <!-- <div class="">
            <a class="btn btn-secondary" href="{{ route('category.index') }}"> Back</a>
        </div> -->
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('category.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Category Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Product Category Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent ID:</strong>
                <input type="text" name="parent_id" class="form-control" placeholder="Product Parent ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <!-- <strong>Status:</strong> -->
                <input type="hidden" name="status" class="form-control">
            </div>
        </div>
        <a class="btn btn-secondary ml-3" href="{{ route('category.index') }}"> <i class="fa fa-chevron-circle-left"></i> Back </a>
            <button type="submit" class="btn btn-success ml-3"><i class="fa fa-check"></i> Submit</button>
    </div>
   
</form>
@endsection
