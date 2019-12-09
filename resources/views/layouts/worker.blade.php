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
        <script src="{{ secure_asset('js/worker.js') }}" defer></script>
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
                            @can('admin')
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/employee">従業員編集</a>
                            </li>
                            @endcan
                        </ul>
                        <!--右側-->
                        <ul class="navbar-nav ml-auto">
                            @guest
                            <li><a class="nav-link" href="{{ route('login')}}">
                                {{ __('messages.Login')}}</a></li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <!-- -->
                                    <a class="dropdown-item" href="{{action('Worker\EmployeeController@edit',['id' => Auth::id()])}}"
                                    >プロフィール確認</a>
                                    <!--ログアウト-->
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
        @push('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ secure_asset('js/worker.js') }}"></script>
        @endpush
        @stack('scripts')
        <script type="text/javascript">
            function confirmDelete(){
                if(!window.confirm('本当に削除しますか?')){
                    event.preventDefault();
                }
            }
        </script>
    </body>
</html>