<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                margin: 0;
            }
            #bg_video {
                position: fixed;
                right: 0;
                bottom: 0;
                top: 0;
                min-width: 100%; 
                min-height: 100%;   
            }
            .content {
                position: fixed;
                top: 70%;
                bottom: -20%;
                left: 63%;
                background: none;
                color: #f1f1f1;
                width: 50%;
                padding: 5px;
            }
            .button {
                display: inline-block;
                padding: 15px 40px;
                background-color: #bdd1ee;
                color: #1d0808;
                text-decoration: none;
                border-radius: 5px;
                border: none;
                cursor: pointer;
                font-family: Arial;
                font-size: 120%;
                position: relative;
            }

        </style>
    </head>
    <body class="antialiased">
        <video autoplay muted loop id="bg_video">
            <source src="/images/White Black Modern Linktree Background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
          </video>
          <div class="content">
            @if (Route::has('login'))            
                {{-- @auth
                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a> --}}
                <a href="{{ route('login') }}" class="button"><b>Log In</b></a>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="button"><b>Sign Up</b></a>
            @endif
        </div>
    </body>
</html>
