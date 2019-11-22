<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <title>@yield('title')</title>
        <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ secure_asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ secure_asset('css/worker.css')}}">
    </head>
    <body>
        <div id="app">
        {{-- ナビゲーションバー--}}
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--左側-->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/worker/daily">日報確認</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/worker/routine">仕事リスト</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/worker/employee">従業員リスト</a>
                            </li>
                        </ul>
                        <!--右側-->
                        <ul class="navbar-nav ml-auto">
                            @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/employee"><b>管理者ページへ</b></a>
                            </li>
                            @endif
                            
                            @guest
                            <li><a class="nav-link" href="{{ route('login')}}">
                                {{ __('messages.Login')}}</a></li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
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
            {{--ここまでナビゲーションバー--}}
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ secure_asset('js/worker.js') }}"></script>
    </body>
</html>