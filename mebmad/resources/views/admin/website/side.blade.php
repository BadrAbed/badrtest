@extends('layouts.app')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

@section('content')
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
	all bu
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Rent bu </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							owen bu </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							apartment </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
						villas </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="row-md-3">

			   @include('admin.website.bu',['bu'=>$bu])

		</div>
	</div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">Badr Abed</a></strong>
</center>
<br>
<br>
@endsection
