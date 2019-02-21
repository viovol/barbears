<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/productsStyle.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
          <a class="navbar-brand visible-xs" href="#">Logo</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="{{ route('products.index')}}">Products</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              @guest
                <li><a href="http://127.0.0.1:8000/login">Login/Register</a></li>
                <li>
                  <a href="{{route('product.shopingCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                    <span class="badge">{{ Session::has('cart')?Session::get('cart')->totalQty:''}}</span>
                  </a>
              </li>
              @else
              @if(Auth::check())
                @if(!(Auth::user()->isAdmin()))
                <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart </a></li>

                @endif
              @endif
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>

                    </li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="{{route('product.shopingCart')}}">Cart</a></li>

                  </ul>
                </li>
              @endguest
            </ul>
      </div>

  </nav>

  @yield('content')
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
  $(function() {

      $('#login-form-link').click(function(e) {
      $("#login-form").delay(100).fadeIn(100);
      $("#register-form").fadeOut(100);
      $('#register-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
      $("#register-form").delay(100).fadeIn(100);
      $("#login-form").fadeOut(100);
      $('#login-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });

  });
</script>
</body>
</html>
