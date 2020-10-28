@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('category.index') }}"> Back </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                    <input type="text" name="status" value="{{ $category->status }}" class="form-control"
                        placeholder="Change the Status">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select id="status_change" class="btn btn-basic">
                        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div> -->
            <!-- <select id="status_change" class="btn btn-basic">
                            <option value="" @if($category->status == '') ? selected : null @endif disabled>Change the Status</option>
                            <option value="active" @if($category->status == 'active') ? selected : null @endif> Active
                            </option>
                            <option value="inactive" @if($category->status == 'inactive') ? selected : null @endif>Inactive
                            </option>
                   </select> -->
            <button type="submit" class="btn btn-success ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection