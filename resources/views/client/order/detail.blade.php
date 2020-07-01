@extends('client.layouts.master')

@section('title','Order Detail')
@section('content')
<a href="{{asset('/')}}"><button class="btn my-3">Back</button></a>
<div class="contaier">
    <table class="table table-bordered table-responsive-md">
        <thead>
          <tr>
            <th>No.</th>
            <th>Image</th>
            <th>Title</th>
            <th>Qty</th>
            <th>price</th>



          </tr>
        </thead>
        <tbody>



           @foreach ($books as $book)
           <tr>

            <td>{{$book->id}}</td>
            <td class="w-25 h-20"><img src="{{asset('/book/'.$book->image)}}" class="img-thumbnail w-50 h-20" alt="image"></td>

           <td>{{$book->title}}</td>
           <td class="text-center">{{$book->qty='1'}}</td>
           <td>{{$book->price}}</td>


            </tr>

           @endforeach


        </tbody>
        <tfoot>

            <tr>
                <td colspan="3"></td>
                <td class="hidden-xs text-center" colspan="2"><strong>Total &nbsp;: &nbsp;&nbsp;&nbsp; {{$total}} Kyats</strong></td>
            </tr>
        </tfoot>


      </table>
</div>

@endsection
