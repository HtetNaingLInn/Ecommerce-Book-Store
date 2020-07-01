@extends('admin.layouts.master')

@section('title','Edit Order')

@section('content')
<div class="container">

     <div class="col-md-8 offset-2">
        <a href="{{url('admin/order')}}"><button class="btn btn-primary mb-3"> <div class="fas fa-arrow-circle-left"></div> Back</button></a>
        <div class="card">

            <div class="card-header">
        <h3 class="text-info">Confirm Order</h3>

            </div>
            <div class="card-body">
                <form method="POST">
                    @include('admin.message.index')
                    @csrf
                    <div class="form-group">
                        <label for="id">Order ID</label>
                    <input type="text" class="form-control" value="{{$order->id}}">
                    </div>
                    <div class="form-group">
                        <label for="name">From</label>
                    <input type="text" class="form-control" value="{{$order->user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Status</label>
                        <select class="form-control" name="status">
                        <option value="{{"Accept"}}">Accept</option>
                        <option value="{{"Pending"}}">Pending</option>
                        <option value="{{"Rejet"}}">Reject</option>

                        </select>
                      </div>


                    <button type="submit" class="btn btn-outline-info float-md-right">Edit</button>
                </form>

            </div>

    </div>
     </div>
    </div>

@endsection
