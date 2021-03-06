<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Muli" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'eSIGUKM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- add icon link -->
    <link rel = "icon" href = "{{ asset('https://pbs.twimg.com/profile_images/1313769206899380225/U4tdn_Uy_400x400.jpg') }}" type = "image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <style>
        html, body {
            background: url("https://cdn2.hubspot.net/hubfs/202339/canvas/images/parallax/Website-Design-Background.png") no-repeat center center fixed;
            margin: 0;
            font-size: 17px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <span>
                    <img src="{{ asset('https://pbs.twimg.com/profile_images/1313769206899380225/U4tdn_Uy_400x400.jpg') }}"  style="width: 40px; border-radius: 75px; border: 2px;"></a>
                </span>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'eSIGUKM') }}
                    
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
                                    <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                    @hasrole('admin')
                                    <a class="dropdown-item" href="{{route('admin.users.index')}}">Manage Users</a>
                                    <a class="dropdown-item" href="{{route('admin.meeting')}}">Manage Meetings</a>
                                    @endhasrole
                                    @hasrole('ajk')
                                    <a class="dropdown-item" href="{{route('admin.users.index')}}">View Users</a>
                                    <a class="dropdown-item" href="{{route('admin.meeting')}}">View Meetings</a>
                                    @endhasrole
                                    @hasrole('lecturer')
                                    <a class="dropdown-item" href="{{route('admin.users.index')}}">View Users</a>
                                    <a class="dropdown-item" href="{{route('admin.meeting')}}">View Meetings</a>
                                    @endhasrole
                                    @hasrole('user')
                                    <a class="dropdown-item" href="{{route('meeting.index')}}">My Meeting</a>
                                    @endhasrole
                                    @impersonate()
                                    <a class="dropdown-item" href="{{route('admin.impersonate.destroy')}}">Stop Impersonating</a>
                                    @endimpersonate
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

        <main class="py-4 container">
            @include('partial.alerts')
            @yield('content')
        </main>
    </div>
</body>
</html>

