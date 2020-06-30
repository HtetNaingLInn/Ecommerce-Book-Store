@extends('admin.layouts.master')

@section('title','Edit Book')

@section('content')
<div class="container col-md-10 offset-1">

        <a href="{{url('admin/book')}}"><button class="btn btn-primary mb-3"> <div class="fas fa-arrow-circle-left"></div> Back</button></a>
        <div class="card">

            <div class="card-header">
        <h3 class="text-info">Edit Book</h3>

            </div>
            <div class="card-body">

              @if (session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
              @endif
                <form method="POST" enctype="multipart/form-data">
                    @include('admin.message.index')
                    @csrf
                    <div class="form-group">
                        <label for="title">Book Title</label>
                    <input type="text" class="form-control"  name="title" value="{{$book->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control"  rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                    <input type="text" class="form-control"  name="price" value="{{$book->price}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Qty</label>
                    <input type="text" class="form-control"  name="qty" value="{{$book->qty}}">
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id">
                            <option value="#">Choose Category</option>
                          @foreach ($cats as $cat)

                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        </select>
                      </div>





                    <div class="form-group">
                        <label class="text-bold" >Upload Yours Book Photos</label>
                        <input type="file" class="form-control" name="image">
                      </div>

                    <button type="submit" class="btn btn-outline-info float-md-right">Edit</button>
                </form>

            </div>

    </div>
     </div>






</div>

@endsection
