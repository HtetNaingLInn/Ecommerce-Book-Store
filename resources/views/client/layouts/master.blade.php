
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
<link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('client/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('client/css/styles.css')}}">

</head>

<body>
    <header>

        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{asset('/')}}"><img src="{{asset('client/images/logo.png')}}" alt="logo"></a>



                    @if (Auth::user())


                    @if (Auth::user()->role ==='Admin')
                    <a class="navbar-brand" href="{{asset('/admin/category')}}"><h5> <i class="text-info">DashBoard</i> </h5></a>
                    @else


                        <a href="{{asset('/')}}"><h5 class="text-dark mr-2">Home</h5></a>


                    <a href="{{action('OrderController@show',Auth::user()->id)}}"><h5 class="text-dark">Order List</h5></a>

                </ul>
                    @endif
                    @endif


                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mr-2" >

                            {{-- <li>
                            <a href="{{asset('/login')}}" class="text-dark">
                                Login<i class="fa fa-user-circle" aria-hidden="true"></i>
                              </a>
                            </li> --}}


                            @guest
                            <li class="nav-item mr-2">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        </ul>
                        <div class="cart my-2 my-lg-0">


                            <a href="{{url('/cart')}}">
                                <i class="fa fa-shopping-cart text-dark" aria-hidden="true"></i>

                                @if (session('items'))
                                {{count(session('items'))}}

                            @endif


                            </a>

                        </div>






                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2"  name="search" type="search" placeholder="Search here..." aria-label="Search">
                            <span class="fa fa-search"></span>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>

<div class="container">
    @yield('content')

</div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4 class="mb-4">Our Address</h4>
                        <h6>The BookStore, 4th Street
                        Beside that building, Myanamr</h6>
                        <h6>Call : 09 9754 598</h6>
                        <h6>Email : info@bookstore.com</h6>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4 class="mb-3">Navigation</h4>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-conditions.html">Terms</a></li>
                            <li><a href="products.html">Products</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6>We are now offering some good discount
                            on selected books go and shop them</h6>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn black">Alright, Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </footer>
<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/js/custom.js')}}"></script>
</body>

</html>
