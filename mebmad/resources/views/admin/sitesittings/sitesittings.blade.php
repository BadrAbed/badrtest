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
            <h3 class="box-title">Edit {{getsitename()}} </h3>
          </div>
 <?php foreach ($sitesittings as $sitesittings): ?>

 <?php endforeach; ?>
		   <form class="form-horizontal" role="form" method="POST" action="{{ url('editsite') }}">
                        {{ csrf_field() }}



                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">site Name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="sitename" value="{{$sitesittings->sitename}}" required>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">facebook</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="facebook" value="{{$sitesittings->facebook}}" required>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">youtube</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="youtube" value="{{$sitesittings->youtube}}" required>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">tiwtter</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="tiwtter" value="{{$sitesittings->tiwtter}}" required>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="address" value="{{$sitesittings->address}}" required>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">phone</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="phone" value="{{$sitesittings->phone}}" required>


                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Desc</label>

                            <div class="col-md-6">
                                <textarea id="email" class="form-control" name="desc" value="{{$sitesittings->desc}}" required>
  {{$sitesittings->desc}}
                         </textarea>

                            </div>
                        </div>



<input id="email" type="hidden" class="form-control" name="id" value="{{$sitesittings->id}}" required>

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
