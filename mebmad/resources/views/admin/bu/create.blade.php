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
            <h3 class="box-title">add bu</h3>
          </div>

		   <form class="form-horizontal" role="form" method="POST" action="{{ url('addbu') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="buname" required >


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="address" required>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">price</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="price" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_rent</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_rent" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_aquare</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_aquare" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_type</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_type" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_desc	</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_desc	" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_meta	</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_meta	" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_langtitube	</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_langtitube" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_latitube	</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_latitube	" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_large_desc	</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_large_desc	" required >


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">bu_state	</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="bu_state	" required >


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
