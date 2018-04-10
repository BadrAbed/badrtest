<!DOCTYPE html>
<html lang="en">
<head>
<body style="background-color:hsla(89, 43%, 51%, 0.3);">
  <title>my blog </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    .MenuThumb{
      width: 50%;
      color: red;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>{{Auth::user()->name}} {{Auth::user()->id}}  Blog <a href="{{route('logout')}}"> logout </a></h4>

      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li><a href="#section2">Friends</a></li>
        <li><a href="#section3">Family</a></li>
        <li><a href="#section3">Photos</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>
    <h2>
 <a href="{{ url('create') }}" class="btn btn-success" > create post </a>
</h2>
    <div class="col-sm-9">
      <h4 class="col-sm-offset-5 col-sm-15"><small>RECENT POSTS</small></h4>
      <hr>

      <?php if($res->isEmpty()){
        echo" <html> <h1 > no post  found  </h1> </html>";
      }
      ?>

      <?php foreach ($res as $res): ?>
<br> </br>
        <h1>{{$res->title}} </h1>

        <h3 > {{$res->body}} </h3>

          <img class="img-responsive MenuThumb" src="{{$res->image}}">
		   <br></br>

          <span style="float:left;">
          <form action="{{route('viewpost')}}" method="get" class="col-sm-offset-15 col-sm-0">
              {{ csrf_field() }}
          <input type="hidden" value="{{$res->id}}" name="id" ></input>
          <input type="submit" value="view"  class="btn btn-primary"></input>

        </form>
      </span>
      <span style="float:left;" >
        <form class="col-sm-offset-17 col-sm-0" action="{{route('delete')}}" method="POST" >
          {{ csrf_field() }}
    <input type="hidden" value="{{$res->id}}" name="id" ></input>
    <input type="submit" value="delete"  class="btn btn-danger"></input>
  </form action="{{route('edit')}}" method="POST">
  </span>
  <span style="float:left;" >
    <form class="col-sm-offset-20 col-sm-0" action="{{route('edit')}}" method="post" >
      {{csrf_field()}}
    <input type="hidden" value="{{$res->id}}" name="id" ></input>
    <input type="submit" value="edit"  class="btn btn-warning"></input>
    </form>
</span>
 <br></br>
  <br></br>
   <br></br>
<h2>----------------------------------------------------------------------------------------</h2>

    <?php endforeach;?>
	
      <br></br>





        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
