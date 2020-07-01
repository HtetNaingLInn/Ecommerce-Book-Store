@extends('client.layouts.master')

@section('title','Order')
@section('content')

<a href="{{asset('/')}}"><button class="btn my-3">Back</button></a>
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
            <th  colspan="2">status</th>

          </tr>
        </thead>
        <tbody>



           @foreach ($orders as $order)
           <tr>

            <td>{{$order->id}}</td>
            <td class="w-25 h-20"><img src="{{asset('/order/'.$order->image)}}" class="img-thumbnail w-50 h-20" alt="image"></td>
           <td>{{$order->user->name}}</td>
            <td>

            <a href="{{action('OrderController@detail',$order->id)}}">Order detail</a>

            </td>
           <td>{{Str::limit($order->description,'50')}}</td>
           <td>{{$order->phone}}</td>
           <td>{{$order->type}}</td>
           <td>{{$order->created_at->diffForHumans()}}</td>
           <td>{{$order->status}}</td>

            </tr>

           @endforeach


        </tbody>


      </table>
</div>

@endsection
