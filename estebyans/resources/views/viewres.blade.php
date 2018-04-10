 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<h2>
<a href="{{route('/')}}"style="text-decoration:none; color:black;" class="btn btn-primary" >
  رجوع الى القائمه الرئيسيه
</a>
</h2>
<body >



<?php foreach ($res as $res): ?>

    {{csrf_field()}}
  <?php


  $ans=App\useranswers::where('quest_id',$res->q_id)->get();
  $anv=App\questionanswers::where('quest_id',$res->q_id)->get();
  $reprot=App\useranswers::where('quest_id',$res->q_id)->get()->count();
  ?>



  <h2 style="text-align: right;">

  {{$res->q_name}} {{$reprot}}

</h2>

<fieldset>
<table class="table table-bordered" style="text-align:right;">
  <thead>
    <tr >


      <th style="text-align: center;"> نتيجه الاستبيان </th>
	   <th style="text-align: center;">اسم الشخس </th>






    </tr>
  </thead>



  <tbody>
 <?php foreach ($anv as $key ): ?>

<tr>
<?php
$report=App\useranswers::where('answer_name',$key->ans_name)->get()->count();
?>
<td> <h3 style="text-align:center;">  {{$key->ans_name}} {{$report}}</h3></td>
<td> <h3 style="text-align:center;">  </h3></td>

</tr>
<?php endforeach; ?>
 </tbody>
</table>

</fieldset>

<?php endforeach; ?>
<br></br>
<br></br>



<br></br>
<br></br>
</body>
