<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SECURDE MP">
    <meta name="author" content="ABC">

    <title>Russelio's Shoe Shop</title>
    <link rel="shortcut icon" href="{{ asset('ABC.ico') }}" >

    <!-- Bootstrap Core CSS-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/superhero_bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/master.css')}}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript  js/bootstrap.min.js-->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Custom CSS -->
    @yield('customCSS')
    @yield('customScripts')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Russelio's Shoe Shop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav pull-right">
                    @if (!Request::is('register') && !Request::is('login'))
                      @if(!empty(Auth::user()))
                        <li class="nav-item username">
                          <a class="nav-link" href="{{ url('/')}}">{{Auth::user()->username}}</a>
                        </li>
                        <li class="nav-item logout">
                          <a class="nav-link" href="{{ url('/logout')}}">Logout</a>
                        </li>
                      @else
                      <li class="nav-item register">
                        <a class="nav-link" href="{{ url('/register')}}">Register</a>
                      </li>
                      <li class="nav-item login">
                        <a class="nav-link" href="{{ url('/login')}}">Login</a>
                      </li>
                      @endif
                    @endif
                    @if (Request::is('login'))
                    <li class="nav-item register">
                      <a class="nav-link" href="{{ url('/register')}}">Register</a>
                    </li>
                    @endif
                    @if (Request::is('register'))
                    <li class="nav-item login">
                      <a class="nav-link" href="{{ url('/login')}}">Login</a>
                    </li>
                    @endif

                  </li>
                </ul>

              <ul class="nav navbar-nav">
                @yield('navbarContents')
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    @yield('pagecontent')
    <!-- /.container -->

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>SECURDE MP T3 AY 2015-2016</p>
                    <p>Russelio's Shoe Shop 2016 - ABC</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->


</body>
@yield('endBodyScripts')
</html>
