<title > الاستبيان  </title>
<h2>
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


<a href="{{route('/')}}"style="text-decoration:none; color:black;" class="btn btn-primary" >
  رجوع الى القائمه الرئيسيه
</a>
</h2>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  alert("Copied the text: " + copyText.value);
}
</script>
<body >

<h3>
  <input type="text" value="{{url()->full()}}" id="myInput">   <button onclick="myFunction()"> نسخ رابط الاستبيان</button></h3>
<form action="{{route('userans')}}" method="post">

<?php foreach ($res as $res): ?>

    {{csrf_field()}}
  <?php


  $ans=App\questionanswers::where('quest_id',$res->q_id)->get();

  ?>





  <h2 style="text-align: right;" style="margin:50px;">
<br></br>
  {{$res->q_name}}
  <input type="hidden" name="q_id[]" value="{{$res->q_id}}"> </input>
  <input type="hidden" name="est_id" value="{{$est_id}}"> </input>

</h2>

<fieldset>
<div>
<?php foreach ($ans as $key ): ?>

<div>
<input required  	oninvalid="this.setCustomValidity('رايك يهمنا من فضلك اجب عن هذا السؤال')"
oninput="setCustomValidity('')" type="radio" name="ansname[{{$res->q_id}}]" style="float: right;" value="{{$key->ans_name}}"

 > <h2 style="text-align:right; ">{{$key->ans_name}} </h2> </input>
<input type="hidden" name="ans_id[]" value="{{$key->quest_answer_id}}"> </input>
</div>


<?php endforeach; ?>
</div>
</fieldset>

<?php endforeach; ?>
<br></br>
<br></br>
<input type="submit" name="submit" value="تسجيل البيانات" style="float:right; width:200px; height:50px; color:black;"></input>

</form>
<br></br>
<br></br>
</body>
