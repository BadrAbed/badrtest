<form action="{{route('addquest')}}" method="post">
{{ csrf_field() }}
  <input type="text" name="name" > </input>
  <input type="hidden" name="est_id" value="{{$est->est_id}}"> </input>
  <input type="hidden" name="q_id" value="{{$quest->quest_id}}"> </input>
  <input type="submit" value="اضافه اجايه جديده" class="btn btn-sucess"> </input>
</form>
