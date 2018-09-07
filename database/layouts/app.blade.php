<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('scripts_header')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
        </nav>
       
        <main class="py-4">
           <div class="container">
                <div class="row">
                     @if(Auth::check())
                     <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">Dashboard</a>
                            </li>


                            @if(Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('users') }}">Users</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">New User</a>
                                </li>
                            @endif

                            <li class="list-group-item">
                                <a href="{{ route('user.profile') }}">My profile</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">Create a new post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts') }}">Show all Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('post.trashed') }}">Show Trashed Post</a>
                            </li>
                           
                            <li class="list-group-item">
                                <a href="{{ route('tags') }}">Show Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">Create a new Tag</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('categories') }}">Show The Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">Create a new Category</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('settings') }}">Setting</a>
                            </li>
                            @endif

                           
                        </ul>
                    </div>
                    <div class="col-md-8">
                    @else
                    <div class="col-lg-8">
                     @endif
                        @yield('content')
                    </div>
                </div>     
           </div>      
        </main>      
    </div>   


@yield('scripts-body')
<script>

    @if( Session::has('info') )
        toastr.info(" {{ Session::get('info') }} ")
    @endif

    @if( Session::has('success') )
        toastr.success(" {{ Session::get('success') }} ")
    @endif

    @if( Session::has('danger') )
        toastr.danger(" {{ Session::get('danger') }} ")
    @endif
</script> 


</body>
</html>