@extends('admin.layouts.master')

@section('title','Add Category')

@section('content')
<div class="container">

     <div class="col-md-8 offset-2">
        <a href="{{url('admin/category')}}"><button class="btn btn-primary mb-3"> <div class="fas fa-arrow-circle-left"></div> Back</button></a>
        <div class="card">

            <div class="card-header">
        <h3 class="text-info">Create New Category</h3>

            </div>
            <div class="card-body">
                <form method="POST">
                    @include('admin.message.index')
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control"  name="name" >
                    </div>
                    <button type="submit" class="btn btn-outline-info float-md-right">Create</button>
                </form>

            </div>

    </div>
     </div>
    </div>

@endsection
