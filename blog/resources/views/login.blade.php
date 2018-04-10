<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<h1 style="text-align:center;"> login  </h1>
<form class="form-horizontal" action="{{route('login')}}" method="POST">
  {{csrf_field()}}

  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-4" for="password">Password:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="password" placeholder="Enter password" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-success">Login</button>
      <a href="{{route('register')}}" class="btn btn-primary"> Join US </a>
           <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
           <a href="{{url('/mail')}}" class="btn btn-primary">forgot password</a>
    </div>
  </div>
</form>
