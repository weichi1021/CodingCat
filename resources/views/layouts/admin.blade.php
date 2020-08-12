<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coding Cat @yield('title')</title>
    <link id="favicon" rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.svg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
      @yield('content')
      @yield('footer')
  </body>
</html>
