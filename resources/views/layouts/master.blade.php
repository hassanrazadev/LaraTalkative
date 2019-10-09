<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/chat-logo.png')}}" />
    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-v4.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <script type="text/javascript">
        {{--   routes   --}}
        let loadLatestMessages = '{{route('loadLatestMessages')}}';
        let sendMessage = '{{route('sendMessage')}}';
    </script>
    @yield('styles')
</head>

<body>
@section('navbar')
    <div class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        @if(!auth()->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('userLogin')}}">Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Inbox</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('doLogout')}}">Logout</a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@show

@yield('content')


<script type="text/javascript" src="{{asset('assets/js/jquery-v3.js')}}" ></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-v4.js')}}" ></script>
<script type="text/javascript" src="{{asset('assets/js/scripts.js')}}" ></script>
@yield('scripts')
</body>
</html>