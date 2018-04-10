<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
#someDiv {

word-spacing: 30px;
    text-align: center;
    word-wrap: break-word;
}
h3.test {
    width: 11em;

text-align: center;
    word-wrap: break-word;
}
.MenuThumb{
  width: 80%;
  height: 60%;
  color: red;
  float: center;
}
</style>
  <div class="col-sm-9" id="outer" >
    <h1 class="col-sm-offset-5 col-sm-15"> POSTS </h1>
    <hr>

    <?php foreach ($res as $res): ?>
      <h6> {{$res->user->name}} {{$res->user->id}} created_at {{$res->created_at}} </h6>
      <h2 class="col-sm-offset-5 col-sm-15" >{{$res->title}} </h2>

    <h3 class="test"> {{$res->body}}</h3>
<img class="img-responsive MenuThumb" src="{{$res->image}}">
      <div>

          <div class="form-group">
            <span style="float:left;">
            <form action="{{route('view')}}" >
                {{ csrf_field() }}
            <input type="hidden" value="{{$res->id}}" name="id" ></input>
            <input type="submit" value="view all"  class="btn btn-success"></input>

          </form>
        </span>
        <span style="float:left;">
          <form  action="{{route('delete')}}" method="POST" >
            {{ csrf_field() }}
        <input type="hidden" value="{{$res->id}}" name="id" ></input>
        <input type="submit" value="delete"  class="btn btn-danger"></input>
        </form>
        </span>
        <span style="float:left;" >
          <span style="float:left;" >
            <form class="col-sm-offset-20 col-sm-0" action="{{route('edit')}}" method="post" >
              {{csrf_field()}}
            <input type="hidden" value="{{$res->id}}" name="id" ></input>
            <input type="submit" value="edit"  class="btn btn-warning"></input>
            </form>
    </span>
</div>




<br></br>
<h2> Leave  comment </h2>
    <form action="{{route('createcomment')}}" method="POST">
{{csrf_field()}}
      <div class="form-group">
        <textarea class="form-control" rows="3" required name="body"></textarea>
      </div>

      <input type="hidden" name="post_id" value="{{$res->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <p><span class="badge">{{$res->count()}}</span> Comments:</p>



<table class="table table-bordered table-striped table-hover">
  <?php foreach ($res->Comments as $comments): ?>
 <tbody>
<tr>
<td>

    <h2 >   {{$comments->body}}     <h2>
    </td>
    <td>
      <?php foreach ($comment as $key): ?>

<?php if ($key->user->id==$comments->user_id): ?>
<?php  $name= $key->user->name ?>
<?php endif; ?>



<?php endforeach; ?>
<h3>{{$name}} <h3> <h5> created_at{{$comments->created_at}}</h5>
    </td>

    <td>

      <form  action="{{route('editcomment')}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="btn btn-warning">edit</button>
        <input type="hidden" class="btn btn-warning" name="id" value="{{$comments->id}}"></input>

</form>

</td>
<td>
  @if($errors->any())
  <h4>{{$errors->first()}}</h4>
  @endif
<form action="{{route('deletecomment')}}"  method="POST">
  {{csrf_field()}}
    <input type="hidden" name="id" value="{{$comments->id}}">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  <button type="submit" class="btn btn-danger">delete</button>
</form>

</td>
</tr>
</tbody>
<?php endforeach; ?>
</table>
     </div>






<?php endforeach; ?>
