<form class="form-horizontal" action="{{route('mail')}}" method="POST">
  {{csrf_field()}}

  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
