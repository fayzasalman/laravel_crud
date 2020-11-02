@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
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

    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                        placeholder="Category name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Parent ID:</strong>
                    <input type="text" name="parent_id" value="{{ $category->parent_id }}" class="form-control"
                        placeholder="parent_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="btn btn-light" name="status">
                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}> Inactive
                        </option>
                        <option value="active" {{ $category->status == 'active'     ? 'selected' : '' }}> Active
                        </option>
                    </select>
                </div>
            </div>
            <a class="btn btn-secondary ml-3" href="{{ route('category.index') }}"> <i class="fa fa-chevron-circle-left"></i> Back </a>
            <button type="submit" class="btn btn-success ml-3"><i class="fa fa-check"></i> Submit</button>

        </div>
    </form>
</div>
@endsection