<html background="red">
<body style="background-color:powderblue;">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<h1 class="col-sm-offset-2 col-sm-10" > create new post </h1>
<form method="POST" action="{{ route('post') }}" class="form-horizontal"  enctype="multipart/form-data" >
  {{ csrf_field() }}

 <div class="form-group"><label class="control-label col-sm-2"> title </label>
<input    type="text" name="title" required></input>
<input    type="hidden" name="user_id" value="{{Auth::user()->id}}"></input>
</div>
<div class="form-group">
<label class="control-label col-sm-2"> <h3> body </h3></label>
<textarea   rows="5" cols="50" name="body" required></textarea>
</div>
<div class="form-group" >

    <label class="control-label col-sm-2"> image </label>
<input type="file" name="image" id="fileToUpload">
</div>
</div>
<div class="form-group" >
  <div class="col-sm-offset-2 col-sm-10">
<input type="submit"  class="btn btn-primary" name="createpost" value="create post"  > </input>
<a href="{{ route('view') }}" class="btn btn-success" > view POSTES <a>
<h3>

</h3>
</div>
</div>

</form>
</body>
</html>