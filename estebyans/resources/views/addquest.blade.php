
<link rel="stylesheet" href="style/style.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>


$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;

        $('#addScnt').live('click', function() {
                $('<p><label for="p_scnts"><input required   class="input" type="text" id="p_scnt" size="55" name="q_name[]" value="" placeholder="اسم السوال "  /></label> <a href="#" id="remScnt"><img src="images/delete.png" class="image"></a></p>').appendTo(scntDiv);
                i++;
                return false;
        });

        $('#remScnt').live('click', function() {
                if( i > 1 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});

</script>

<body  style="background:green;">
  <?php if (session()->has('message')): ?>
    <script type="text/javascript">
      alert('  {{ session()->get('message') }}');
    </script>

  <?php endif; ?>

  <?php if (session()->has('delet_mass')): ?>
    <script type="text/javascript">
      alert('  {{ session()->get('delet_mass') }}');
    </script>

  <?php endif; ?>
<div class="container" >
  <form id="contact" action="" method="post" action="{{route('addquest')}}">
{{csrf_field()}}
<h3 class="text-center">  اضافه سؤال جديد </h3>

    <fieldset>
      <div id="p_scents">
      <label for="p_scnts">
        <input type="text" id="p_scnt" name="q_name[]" placeholder="اسم السوال " class="input" size="60"  required
		oninvalid="this.setCustomValidity('من فضلك ادخل اسم السؤال ')"
 oninput="setCustomValidity('')"

		> </input>

        <a href="#" id="addScnt"> <img src="images/insert.png" class="image">  </a>
       </lable>
      </div>
    </fieldset>
    <fieldset>

      <input type="hidden" name="est_id" value="{{$res}}"> </input>

    </fieldset>

    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">اضافه عذه الاسئله الى هذا الاستبيان</button>
    </fieldset>
    <br></br>
    <fieldset>
    <a href="{{route('addest')}}"style="text-decoration:none; color:black; width: 400px;" class="btn btn-primary" >
الرجوع الى الاستبيانات
    </a>
</fieldset>
<br></br>

      <fieldset>
        <table class="table table-bordered">
   <thead>
     <tr>
       <th>تعديل السؤال</th>
       <th>حذف السؤال</th>
       <th>اضافه اجابه</th>
       <th> اسم السؤال </th>
     </tr>
   </thead>
   <tbody>
     <?php foreach ($quest as $quest): ?>
     <tr>
       <td><img src="images/update.png" class="image"></td>
       <td><a href="{{route('deletequest',['id'=>$quest->q_id])}}"><img src="images/delete.png" class="image"></td>


        <td> <a href="{{route('addans',['quest_id'=>$quest->q_id,'est_id'=>$res])}}"> <img src="images/insert.png" class="image"></td>

       <td >{{$quest->q_name}}</td>
     </tr>
   <?php endforeach; ?>

   </tbody>
 </table>


</fieldset>


  </form>


</div>
</body>
