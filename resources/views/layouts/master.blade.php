<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>People Tracker</title>
<!-- CDN, if preferred -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->

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
        @yield('heading')
    </div>
</main>

<div class="alert alert-info" role="alert">Full name, e.g. Daniel Davies</div>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">Person name</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="alert alert-info" role="alert">Please only provide one, e.g. Cardiff University</div>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">School, address, age, location, etc.</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<button type="button" class="btn btn-default">Search</button>

<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>