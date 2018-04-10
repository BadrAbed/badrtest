<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<h2> edit your comment </h2>
    <form action="{{route('updatecomment')}}" method="POST">
{{csrf_field()}}
      <div class="form-group">
        <textarea class="form-control" rows="3" required name="body"></textarea>
      </div>

      <input type="hidden" name="id" value="{{$id}}">
      <input    type="hidden" name="user_id" value="{{Auth::user()->id}}"></input>

      <button type="submit" class="btn btn-success">Submit</button>
    </form>
