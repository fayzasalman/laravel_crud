@extends('layouts.app')
@section('content')
<div class="card" style="width: 22rem; margin:0 auto;">
    <a class="btn btn-secondary ml-0.2" href="{{ route('category.index') }}"> <i class="fa fa-chevron-circle-left"></i>
        Back </a>

    <div class="card-header text-success text-center">
        <h3 class="card-title"><strong>Product No:</strong> {{ $category->id }}</h3>
    </div>
    <div class="card-body text-center">
        <h6 class="card-title "> <strong>Product Category Name:</strong> {{ $category->name }}</h6>
        <h5 class="card-body "> <strong>Parent ID:</strong>
            {{ $category->parent_id }}</h5>
            <h5 class="card-title ">
            <strong>Status:</strong> {{ $category->status }}
        </h5>
    </div>
</div>
@endsection