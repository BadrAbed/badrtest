<title > اضافه اجابه </title>
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
                $('<p><label for="p_scnts"><input  required class="input" type="text" id="p_scnt" size="55" name="ans_name[]" value="" placeholder=" اسم الاجابه" /></label> <a href="#" id="remScnt"><img src="images/delete.png" class="image"></a></p>').appendTo(scntDiv);
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
<body style="background:green;">

<div class="container">
  <?php if (session()->has('message')): ?>
    <script type="text/javascript">
      alert('  {{ session()->get('message') }}');
    </script>

  <?php endif; ?>
  <form id="contact" action="" method="post" action="{{route('addans')}}">



    <a href="{{route('addest')}}" style="text-decoration:none; color:black;">
    <h3 class="text-center">   الرجوع الى الاستبيانات </h3>
    </a>

  <br></br>
{{csrf_field()}}
<h3 class="text-center"> اضافه الاجابه </h3>

    <fieldset>
      <div id="p_scents">
      <label for="p_scnts">
        <input type="text" id="p_scnt" name="ans_name[]" placeholder=" اسم الاجابه " class="input" required
size="55"
		oninvalid="this.setCustomValidity('من فضلك ادخل اسم الاجابه ')"
 oninput="setCustomValidity('')"
		> </input>

        <a href="#" id="addScnt"> <img src="images/insert.png" class="image">  </a>
       </lable>
      </div>
    </fieldset>
    <fieldset>
<input type="hidden" name="est_id" value="{{$est_id}}" ></input>

    </fieldset>

    <fieldset>
    <input type="hidden" name="quest_id" value="{{$quest_id}}" ></input>


    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">اضافه هذه الاجابات الى هذا السؤال</button>
    </fieldset>
    <fieldest>

        <table class="table table-bordered">
    <thead>
      <tr>

        <td style="text-align:right;"> حذف الاجابه </td>
          <td style="text-align:right;" > اسم الاجابه </td>
      </tr>
    </thead>
      <tbody>


      <?php foreach ($quest_ans as $quest_ans): ?>
<tr>
      <td  style="text-align:right;">  <img src="images/delete.png" class="image"> </td>
        <td  style="text-align:right;" >  {{$quest_ans->ans_name}} </td>
        </tr>
      <?php endforeach; ?>

    </tbody>

    </table>
    </fieldset>
  </form>

</div>

</body>
