@extends('client.layouts.master')

@section('title','Cart')

@section('content')


<section>
<div class="container-fluid pt-4">
    <div class="row">

            <div class="col-md-12">


               <div class="container">
                <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Image</th>


                                        <th style="width:8%">Quantity</th>
                                        <th style="width:32%" class="text-center">Price</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                            <div class="col-sm-2 hidden-xs"><img src="{{asset('/book/'.$book->image)}}" alt="..." class="img-responsive"/></div>
                                                <div class="col-sm-10">
                                                <h4 class="nomargin">{{$book->title}}</h4>

                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Quantity" class="text-center">
                                            1
                                        </td>
                                     <td data-th="Subtotal" class="text-center">{{$book->price}}</td>


                                        <td class="actions" data-th="">

                                        <a href="{{action('HomeController@cartDelete',$book->id)}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                    <tr>
                                    <td><a href="{{asset('/')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>

                                    <td class="hidden-xs text-center" colspan="2"><strong>Total &nbsp;: &nbsp;&nbsp;&nbsp; {{$total}} Kyats</strong></td>
                                        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                                    </tr>
                                </tfoot>

                            </table>
            </div>



            </div>
    </div>
</div>
</section>
@endsection
