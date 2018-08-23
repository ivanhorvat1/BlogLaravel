<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    @yield('styles')

    <!-- THEEME PANEL -->
    <!-- Menu CSS -->
    <link href="{{ asset('css/sidebar-nav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinners.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">-->
    <!-- animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('css/blue-dark.css') }}" id="theme" rel="stylesheet">
    <!-- END THEEME PANEL -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="top-left-part"><a class="logo" href="index.html"><b></b><span class="hidden-xs"></span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ asset(Auth::user()->profile->avatar) }}" alt="user-img" width="36" style="border-radius: 50%" class="img-circle">
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
        </nav>


        <!--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">

                    </ul>


                    <ul class="navbar-nav ml-auto">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
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
                </div>
            </div>
        </nav>-->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                @if(Auth::check())
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('home') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('categories') }}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Categories</span></a>
                        </li>
                        <li>
                            <a href="{{ route('tags') }}" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Tagsasdfasd</span></a>
                        </li>
                        @if(Auth::user()->admin)
                            <li>
                                <a href="{{ route('users') }}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Users</span></a>
                            </li>
                            <li>
                                <a href="{{ route('user.create') }}" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i><span class="hide-menu">New user</span></a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('user.profile') }}" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i><span class="hide-menu">My profile</span></a>
                        </li>
                        <li>
                            <a href="{{ route('tag.create') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Create tag</span></a>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">All posts</span></a>
                        </li>
                        <li>
                            <a href="{{ route('posts.trashed') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">All trashed posts</span></a>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Create new category</span></a>
                        </li>
                        <li>
                            <a href="{{ route('post.create') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Create new post</span></a>
                        </li>
                        @if(Auth::user()->admin)
                            <li>
                                <a href="{{ route('settings') }}" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Settings</span></a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                @yield('content')

            </div>

            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>


    <!--<div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories') }}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags') }}">Tags</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('users') }}">Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">New user</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('user.profile') }}">My profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">Create tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts') }}">All posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.trashed') }}">All trashed posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">Create new category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">Create new post</a>
                            </li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('settings') }}">Settings</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>-->
    </div>

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

    <!-- THEME PANEL
    <script src="{{ asset('js/sidebar-nav.min.js') }}"></script>-->
    <!--slimscroll JavaScript
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>-->
    <!--Wave Effects
    <script src="{{ asset('js/waves.js') }}"></script>-->
    <!--Counter js
    <script src="{{ asset('js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script> -->
    <!--Morris JavaScript
    <script src="{{ asset('js/raphael-min.js') }}"></script>
    <script src="{{ asset('js/morris.js') }}"></script>-->
    <!-- Custom Theme JavaScript
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dashboard1.js') }}"></script>-->
    <!--<script src="{{ asset('js/jquery.toast.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.toast({
                heading: 'Welcome to Pixel admin',
                text: 'Use the predefined ones, or specify a custom position object.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 3500,
                stack: 6
            })
        });
    </script>-->
    <!-- END THEME PANEL -->


    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

    @yield('scripts')
</body>
</html>
