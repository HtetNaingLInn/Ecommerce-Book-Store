@extends('admin.layouts.master')

@section('title','Order List')
@section('content')
@if (session('status'))
    <p class="alert alert-success">{{session('status')}}</p>
        @endif
<div class="contaier">
    <table class="table table-bordered table-responsive-md">
        <thead>
          <tr>
            <th>No.</th>
            <th>Image</th>
            <th>Customer</th>
            <th>Order Book</th>
            <th>Description</th>
            <th>phone</th>
            <th>type</th>
            <th>Time</th>
            <th>status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>



           @foreach ($orders as $order)
           <tr>

            <td>{{$order->id}}</td>

            <td class="w-25 h-20"><img src="{{asset('/order/'.$order->image)}}" class="img-thumbnail w-50 h-20" alt="image"></td>
            <td>{{$order->user->name}}</td>
            <td>

            <a href="{{action('admin\OrderController@detail',$order->id)}}">Order detail</a>

            </td>
           <td>{{Str::limit($order->description,'50')}}</td>
           <td>{{$order->phone}}</td>
           <td>{{$order->type}}</td>
           <td>{{$order->created_at->diffForHumans()}}</td>

           <td>{{$order->status}}</td>
           <td><a href="{{action('admin\OrderController@edit',$order->id)}}" class="btn-sm btn-outline-info"><i class="fas fa-edit"></i></a></></td>

            </tr>

           @endforeach


        </tbody>


      </table>
</div>

@endsection
