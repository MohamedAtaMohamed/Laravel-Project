<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    @yield('style')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Website
                        {{ config('app.name', 'Website') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                                    <li>
                                        <a href="{{route('user.profile')}}">Update Profile</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Check if is user have permissions or not -->
                @if(Auth::check())
                <div class="col-md-4 col-xs-12">
                    <ul class="list-group">
                        <!-- It is link for Dashboard  -->
                        <li class="list-group-item">
                            <a href='{{route('home')}}'>Dashboard</a>
                        </li>

                        <li class="list-group-item">
                            <a href='{{route('users')}}'>Show users</a>
                        </li>

                        <li class="list-group-item">
                            <a href='{{route('users.create')}}'>Add users</a>
                        </li>

                        <li class="list-group-item">
                            <a href='{{route('categories')}}'>Show Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href='{{route('posts')}}'>Show Posts</a>
                        </li>

                        <li class="list-group-item">
                            <a href='{{route('post.trashed')}}'>Show Trashed Posts</a>
                        </li>
                        <li class="list-group-item">
                            <a href='{{route('category.create')}}'>Create New Category</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('post.create')}}">Create New Post</a>
                        </li>

                        <li class="list-group-item">
                            <a href="{{route('tags')}}">All Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tags.create')}}">Create Tag </a>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="col-md-8 col-xs-12 center-block">
                    @yield('content')
                </div>
            </div>
        </div>



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}");
        @elseif(Session::has('danger'))
            toastr.warning("{{Session::get('danger')}}");
        @endif

    </script>
    @yield('script')
</body>
</html>
