@extends('client.layouts.master')

@section('title',$book->title)

@section('content')
<hr>
<a href="{{asset('/')}}"><button class="btn ">Back</button></a>
<section class="product-sec my-3">
    <div class="container">
    <h1>{{$book->title}}</h1>
        <div class="row">
            <div class="col-md-6 slider-sec">
                <!-- main slider carousel -->
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                        <img src="{{asset('/book/'.$book->image)}}" class="img-fluid">
                        </div>

                    </div>

                </div>
                <!--/main slider carousel-->
            </div>
            <div class="col-md-6 slider-content">
            <p>{{$book->description}}</p>

                <ul>

                    <li>
                        <span class="name">Book Price</span><span class="clm">:</span>
                    <span class="price final">{{$book->price}}</span>
                    </li>


                </ul>
                <div class="btn-sec">
                <a href="{{action('HomeController@add',$book->id)}}"><button class="btn ">Add To cart</button></a>
                    <button class="btn black">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
