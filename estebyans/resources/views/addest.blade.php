





<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	<title>اضافه اسبيان </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="style/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

 	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">

		<div class="container-contact2">

			<div class="wrap-contact2">

				<form class="contact2-form validate-form" action="{{route('addest')}}" method="post" >
          {{ csrf_field() }}
					<span class="contact2-form-title">
						اضافه استنبيان جديد
					</span>

					<div class="wrap-input2 validate-input" data-validate="Name is required">
						<input class="input2" type="text" name="name" class="input" required style="text-align:center;"

						oninvalid="this.setCustomValidity('من فضلك ادخل اسم الاستبيان ')"
 oninput="setCustomValidity('')"
						>
						<span class="focus-input2" data-placeholder="اسم الاستبيان" style="text-align:right;"></span>
					</div>



					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								اضافه اسبيان جديد
							</button>

						</div>

					</div>
				</form>
        <div class="container-contact2-form-btn">
          <div class="wrap-contact2-form-btn">
            <div class="contact2-form-bgbtn"></div>
            <a href="{{route('/')}}" class="contact2-form-btn">
              رجوع الى القائمه الرئيسيه
</a>



          </div>

        </div>
<br></br>
<br></br>

        <table class="table table-bordered">
          <thead>
            <tr>
<th>تعديل الاستبيان</th>


								  <th>حذف الاستبيان</th>

<th>اضافه سؤال </th>
<th>اسم الاستبيان</th>
            </tr>
          </thead>
          <tbody>
<?php foreach ($res as $res): ?>
            <tr class="success">



								<td><img src="images/update.png" class="image"></td>
<td> <a href="{{route('deleteest',['id'=>$res->est_id])}}"><img src="images/delete.png" class="image"></td>
								<td><a href="{{route('addquest',['id'=>$res->est_id])}}"><img src="images/insert.png" class="image" > </a> </td>
<td> {{$res->est_name}}</td>
							<?php endforeach; ?>
            </tr>

          </tbody>
        </table>
        </div>
			</div>

		</div>


	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
