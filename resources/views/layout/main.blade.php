<!doctype html>
<head>
    <style>

        form.ini{
            display:inline-block;
        }
        .hide{
            display:none;  
        }

    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleassets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/85759de0b0.js" crossorigin="anonymous"></script>
 
    <aside id="left-panel" class="left-panel" style="background-image:url('wallpeper.jpg')">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/home">Hello, Administrator</a>
                <a class="navbar-brand hidden" href="">A</a>
            </div>
   
            {{-- dd(Auth::user()->LevelLogin); --}}
            <div id="main-menu" class="main-menu collapse navbar-collapse" >
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin/home"><i class="menu-icon fa-solid fa-house-user"></i>Home</a>
                    </li>
                    <li>
                        <a href="/admin/wartawan"><i class="menu-icon fa-solid fa-person"></i>Calon Wartawan</a>
                    </li>
                    <li>
                        <a href="/admin/periode"><i class="menu-icon fa-solid fa-calendar-days"></i>Periode</a>
                    </li>
                    <li>
                        <a href="/admin/datakriteria"><i class="menu-icon fa-solid fa-scale-balanced"></i>Kriteria</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa-solid fa-arrow-down-9-1"></i>Nilai</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="/admin/nilaiawal">Nilai Awal</a></li>
                            <li><a href="/admin/vektors">Nilai Vektor S</a></li>
                            <li><a href="/admin/vektorv">Nilai Vektor V</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="/admin/nilaiawal"><i class="menu-icon fa-solid fa-arrow-down-9-1"></i>Data Nilai</a>
                    </li> --}}
                    <li>
                        <a href="/admin/hasilakhir"><i class="menu-icon fa-solid fa-square-poll-vertical"></i>Hasil SPK</a>
                    </li>
                    <li>
                        <a hidden href="/" type="button" id="button"><i class="menu-icon fa fa-dashboard"></i>  Hasil SPK</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
 
    <div id="right-panel" class="right-panel" style="margin-top: -100px">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>
 
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/user/profile"><i class="fa fa -cog"></i>Settings</a>
                            <!-- <a class="nav-link" href="http://127.0.0.1:8000/"><i class="fa fa-power -off"></i>Logout</a> -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
 
                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-id"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-jp"></i>
                            </div>
                        </div>
                    </div>
 
                </div>
            </div>
 
        </header><!-- /header -->

        @yield('juduldalam')
        
        {{-- <div class="di"></div> --}}
        @yield('konten')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>