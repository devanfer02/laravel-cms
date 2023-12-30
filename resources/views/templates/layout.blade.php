<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
  <script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
  <title>@yield('page_title')</title>
</head>
<body class="d-flex flex-column min-vh-100">
  @include('templates/navbar')
  @yield('content')
  @include('templates/footer')
</body>
</html>
