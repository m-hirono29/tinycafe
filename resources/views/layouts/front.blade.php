<!DOCTYPE>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>
        
        <!-- Scripts -->
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="http://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
            
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- 後で作成するCSSを読み込む　--}}
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="splash">
            <div id="splash_text"></div>
        </div>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'TINYCafe') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                        </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <span>〒150‐0000<br>東京都渋谷区●●3‐32<br>☏050-0000-xxxx</span>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <hr color="#c0c0c0">
                    <div class="row">
                        <div class="headline col-md-8 mx-auto">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="caption mx-auto">
                                        <div class="front-menu">
                                            <a href="/concept" class="front-menu p menu-link">このカフェについて</a>
                                            <a href="/menu" class="front-menu p menu-link">メニュー</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <hr color="#c0c0c0">
            </div>
            {{-- ここまでナビゲーションバー　--}}
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておく --}}
                @yield('content')
            </main>
        </div>
    </body>
    
</html>