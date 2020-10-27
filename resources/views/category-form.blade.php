@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8"> @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-center font-weight-bold">
                            Laravel - Add a new category
                        </div>
                        <div class="card-body">
                            <form name="category" id="category" method="post" action="{{url('store-form')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Product-Category Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Parent ID</label>
                                    <input type="text" id="parent_id" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                    @error('parent_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
