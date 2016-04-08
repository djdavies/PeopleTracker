<!doctype html>
<html lang="en">
<head>
@yield('title')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CDN, if preferred -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
  @yield('css')
</head>
<body class="language-php">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">People Tracker</a>
    </div>
    <div class="nav navbar-nav navbar-right">
        <li><a href="/googlesearch">Google Search</a></li>
        <li><a href="/people">Current People</a></li>
        <li><a href="/seeding">Seeding</a></li>
    </div>
  </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
@yield('js')

</body>
</html>