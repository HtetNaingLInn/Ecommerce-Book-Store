@extends('client.layouts.master')

@section('title','Home')

@section('content')

@if (session('status'))
<p class="alert alert-success">{{session('status')}}</p>
    @endif

<section class="slider">
    <div class="container">
        <div id="owl-demo" class="owl-carousel owl-theme">
            <div class="item">
                <div class="slide">
                <img src="{{asset('client/images/slide1.jpg')}}" alt="slide1">
                    <div class="content">
                        <div class="title">
                            <h3>welcome to bookstore</h3>
                            <h5>Discover the best books online with us</h5>
                            <a href="#" class="btn">shop books</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slide">
                <img src="{{asset('client/images/slide2.jpg')}}" alt="slide1">
                    <div class="content">
                        <div class="title">
                            <h3>welcome to bookstore</h3>
                            <h5>Discover the best books online with us</h5>
                            <a href="#" class="btn">shop books</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slide">
                <img src="{{asset('client/images/slide3.jpg')}}" alt="slide1">
                    <div class="content">
                        <div class="title">
                            <h3>welcome to bookstore</h3>
                            <h5>Discover the best books online with us</h5>
                            <a href="#" class="btn">shop books</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="slide">
                <img src="{{asset('client/images/slide4.jpg')}}" alt="slide1">
                    <div class="content">
                        <div class="title">
                            <h3>welcome to bookstore</h3>
                            <h5>Discover the best books online with us</h5>
                            <a href="#" class="btn">shop books</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="recomended-sec">
    <div class="container">
        <div class="title">
            <h2>highly recommendes books</h2>
            <hr>
        </div>



        <div class="row">
            @foreach ($Books as $book)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                <img src="{{asset('/book/'.$book->image)}}" alt="img">
                <h3>{{$book->title}}</h3>
                <h6><span class="price">{{$book->price}} kyats</span> / <a href="#">Buy Now</a></h6>
                    <div class="hover">
                    <a href="{{action('HomeController@detail',$book->id)}}">
                        <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<section class="my-4">
    <div class="container col-md-12">
        <div class="row">
           <div class="col-md-2">
            <a href="{{asset('/')}}"><button class="btn btn-warning">All</button></a>
           </div>
        @foreach ($cats as $cat)


        <div class="col-md-2 mb-4">

        <a href="{{action('HomeController@category',$cat->id)}}">  <button class="btn btn-warning" value="{{$cat->id}}">{{$cat->name}}</button></a>

    </div>
        @endforeach
    </div>
    </div>
</section>


<section class="recomended-sec">

        <div class="container">
            <div class="title">
                <h2>Recent Books Sales </h2>
                <hr>
            </div>

            <div class="row">
                @foreach ($books as $book)
                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="item">
                    <img src="{{asset('/book/'.$book->image)}}" alt="img">
                    <h3>{{$book->title}}</h3>
                    <h6><span class="price">{{$book->price}} kyats</span> / <a href="#">Buy Now</a></h6>
                        <div class="hover">
                        <a href="{{action('HomeController@detail',$book->id)}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <div class="col-md-12 pagination justify-content-center text-center mt-4">
                {{$books->links()}}
            </div>
        </div>
</section>
<section class="features-sec">
    <div class="container">
        <ul>
            <li>
                <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                <h3>SAFE SHOPPING</h3>
                <h5>Safe Shopping Guarantee</h5>
                <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
            </li>
            <li>
                <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                <h3>30- DAY RETURN</h3>
                <h5>Moneyback guarantee</h5>
                <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
            </li>
            <li>
                <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                <h3>24/7 SUPPORT</h3>
                <h5>online Consultations</h5>
                <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
            </li>
        </ul>
    </div>
</section>

@endsection
