<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>People Tracker</title>
<!-- TODO: local storage -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->

<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />


</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">People Tracker</a>
    </div>
    <div class="nav navbar-nav navbar-right">
        <li><a href="#">Google Search</a></li>
        <li><a href="#">Facebook Search</a></li>
    </div>
  </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>