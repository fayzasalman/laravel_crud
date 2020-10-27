@extends('layouts.app')

@section('content')
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin Panel - Product Category List </h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-dark" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>P.No</th>
            <th>Product Category Name</th>
            <th>Parent ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($category as $catego)
        <tr>
            <td>{{ $catego->id }}</td>
            <td>{{ $catego->name }}</td>
            <td>{{ $catego->parent_id }}</td>
            <td>
                <form action="{{ route('category.destroy',$catego->id) }}" method="POST">
    
                    <a class="btn btn-secondary" href="{{ route('category.edit',$catego->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $category->links() !!}
</div>
@endsection
