@extends('client.layouts.master')

@section('title','Payment Order')

@section('content')
@include('admin.message.index')
<div class="container">
    <div class="row">
        <div class="col-md-6">

        Your Name -<i>{{$user->name}}</i><br>
        Your Email - <i>{{$user->email}}</i>
        <hr>
        <h4 class="text text-warning">Please Choose Your Payment Ways</h4>

        <hr>
        <form  class="col-md-12 my-4" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" value="KBZ_Pay">
                    <label class="form-check-label">
                     <h5>KBZ Pay</h5> <br>
                     Please Pay with KBZ pay (09-967243391,Htet Naing Linn)
                    </label>
                  </div>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type"  value="Wave_Pay">
                    <label class="form-check-label">
                     <h5>Wave Pay</h5> <br>
                     Wave account (09-967243391)
                    </label>
                  </div>
                  <hr>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type"  value="AYA_mobile_banking">
                    <label class="form-check-label">
                     <h5>AYA Mobile Banking</h5> <br>
                   <i>  99930799947912301</i><br>

                     Htet Naing Linn
                    </label>
                  </div>
                    <hr>

                <div class="form-group mt-3">
                    <label for="phone"><h5>Phone</h5></label>
                    <input type="text" class="form-control"  placeholder="Enter Your Phone No." name="phone">

                  </div>
            <input type="hidden" name="user_id" value="{{$user->id}}">


                  @foreach ($Books as $Book)


                     <input type="hidden" name="book[]" value="{{$Book->id}}">
                  @endforeach




            <div class="form-group">
                <label for="image"><h5>Screenshot your pay slip</h5></label>
                <input type="file" class="form-control-file" name="image">
              </div>
              <div class="form-group">
                <label for="description"><h5>Description</h5></label>
                <textarea class="form-control" rows="3" name="description" placeholder="Eneter your payment way "></textarea>
              </div>
                <button type="submit" class="btn btn-primary float-right mb-4">Order Now!</button>
              </form>
        </div>
        <div class="col-md-6">




                 <table id="cart" class="table table-hover table-condensed col-md-8">
                                 <thead>
                                     <tr>
                                         <th>Image</th>
                                         <th >Quantity</th>
                                         <th  class="text-center">Price</th>

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


                                         </td>
                                     </tr>
                                     @endforeach

                                 </tbody>
                                 <tfoot>

                                     <tr>
                                     <td><a href="{{asset('/')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>

                                     <td class="hidden-xs text-center" colspan="2"><strong>Total-{{$total}}Kyats</strong></td>





                                     </tr>
                                 </tfoot>

                             </table>


    </div>
</div>
</div>
@endsection
