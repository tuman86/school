<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'School') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jquery-1.12.4.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
</head>
<body>
    <div id="app">
      @include('layouts.header')
      @if(session()->has('message.level'))
          <div class="alert alert-{{ session('message.level') }}">
          {!! session('message.content') !!}
          </div>
      @endif
      <div class="container">
        <div class="row">



            @yield('content')

        </div>
      </div>
    </div>

    <!-- Scripts -->

</body>
</html>
