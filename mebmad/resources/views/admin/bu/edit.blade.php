@extends('admin/layouts/layout')

@section('title')
users controll
@endsection
@section('header')



@endsection

@section('content')


<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit User</h3>
          </div>
 <?php foreach ($user as $user): ?>

 <?php endforeach; ?>
		   <form class="form-horizontal" role="form" method="POST" action="{{ url('edituser') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required >


                            </div>
                        </div>
                        <div class="form-group">


                            <label for="name" class="col-md-4 control-label">Type ::
                              <?php if ($user->admin==1): ?>
                                Admin
                                <?php else: ?>
                                User
                              <?php endif; ?>

                            </label>

                            <div class="col-md-6">


                              <select name="type" class="form-control">

    <option value=1 >ADMIN</option>
    <option value=2 >USER</option>

  </select>



                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>


                            </div>
                        </div>


<input id="email" type="hidden" class="form-control" name="id" value="{{$user->id}}" required>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> UPDATE
                                </button>
                            </div>
                        </div>
                    </form>

          <!-- /.box-header -->
          <div class="box-body">
		  </div>
		   </div>
		    </div>
			 </div>
			  </section>
@endsection


@section('footer')

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<!-- page script -->
<script type="text/javascript">
$(function () {

$('#example2').DataTable({
'paging'      : true,
'lengthChange': true,
'searching'   : true,
'ordering'    : true,
'info'        : true,
'autoWidth'   : true
})
})
</script>
@endsection
