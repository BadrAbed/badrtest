@extends('admin/layouts/layout')
@section('title')
users controll
@endsection
@section('header')


<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection







  @section('content')
  <!-- Content Wrapper. Contains page content -->

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">

            <h3 class="box-title">Hover Data Table</h3> <form class="" action="{{route('search')}}" method="get">
              <input type="text" name="search" ></input>
              <input type="submit" value="search"></input>
            </form>
            <?php if (isset($search)): ?>
<?php if (!$search->isempty()): ?>
                <div class="box-body">
                  <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
					  <th>Price</th>
                      <th>Email</th>
                      <th>type</th>
					  <th> state </th>

                      <th>UPdate</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>




<?php foreach ($search as $search ): ?>
                    <tr>
                      <td>{{$search->id}}</td>

                      <td>{{$search->name}}</td>
                      <td> {{$search->email}}</td>
                      <td>

                        <?php if ($search->admin==1): ?>
                          Admin
                          <?php else: ?>
                        User
                                  <?php endif; ?>


                      </td>
                      <td><a href="{{route('edituser',['id'=>$search->id])}}"> Update <a></td>
                          <td><a href="{{route('deleteuser',['id'=>$search->id])}}"> Delete <a></td>
                    </tr>
<?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>Email</th>
                      <th>UPdate</th>
                      <th>Delete</th>

                    </tr>

                    </tfoot>


                  </table>
                  <?php else: ?>
                    not found
<?php endif; ?>

          <?php else: ?>





          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="data" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>bu_price</th>
                <th>bu_rent</th>
                <th>bu_aquare</th>
                <th>bu_type</th>
                <th>bu_langtitube</th>
                <th>bu_latitube</th>
                <th>bu_large_desc</th>
                <th>bu_state</th>
                <th>user_name</th>
                <th>created_at</th>

              </tr>
              </thead>
              <tbody>
                <?php foreach ($bu as $bu): ?>

              <tr>
                <td>{{$bu->id}}</td>
                <td>{{$bu->bu_name}}</td>
                <td> {{$bu->bu_price}}</td>
                <td> {{$bu->bu_rent}}</td>
                <td> {{$bu->bu_aquare}}</td>
                <td> {{$bu->bu_type}}</td>
                <td> {{$bu->bu_langtitube}}</td>
                <td> {{$bu->bu_latitube}}</td>
                <td> {{$bu->bu_large_desc}}</td>
                <td> {{$bu->bu_state}}</td>
                <td> {{$bu->user_name}}</td>
                <td> {{$bu->created_at}}</td>





              </tr>
             <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>bu_price</th>
                  <th>bu_rent</th>
                  <th>bu_aquare</th>
                  <th>bu_type</th>
                  <th>bu_langtitube</th>
                  <th>bu_latitube</th>
                  <th>bu_large_desc</th>
                  <th>bu_state</th>
                  <th>created_at</th>

              </tr>

              </tfoot>

            </table>
<?php endif; ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      <!-- /.col -->

    <!-- /.row -->
  </section>
  <!-- /.content -->

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
      var lastIdx = null;

      $('#data thead th').each( function () {
          if($(this).index()  < 4 ){
              var classname = $(this).index() == 6  ?  'date' : 'dateslash';
              var title = $(this).html();
              $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
          }else if($(this).index() == 4){
              $(this).html( '<select><option value="0"> عضو </option><option value="1"> مدير الموقع </option></select>' );
          }

      } );

      var table = $('#data').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ url('/adminpanel/users/data') }}',
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'created_at', name: 'created_at'},
              {data: 'admin', name: 'admin'},
              {data: 'exame', name: 'exame'},
              {data: 'control', name: ''}
          ],
          "language": {
              "url": "{{ Request::root()  }}/admin/cus/Arabic.json"
          },
          "stateSave": true,
          "responsive": true,
          "order": [[0, 'desc']],
          "pagingType": "full_numbers",
          aLengthMenu: [
              [25, 50, 100, 200, -1],
              [25, 50, 100, 200, "All"]
          ],
          iDisplayLength: 25,
          fixedHeader: true,

          "oTableTools": {
              "aButtons": [


                  {
                      "sExtends": "csv",
                      "sButtonText": "ملف اكسل",
                      "sCharSet": "utf16le"
                  },
                  {
                      "sExtends": "copy",
                      "sButtonText": "نسخ المعلومات",
                  },
                  {
                      "sExtends": "print",
                      "sButtonText": "طباعة",
                      "mColumns": "visible",


                  }
              ],

              "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
          },

          "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
          ,initComplete: function ()
          {
              var r = $('#data tfoot tr');
              r.find('th').each(function(){
                  $(this).css('padding', 8);
              });
              $('#data thead').append(r);
              $('#search_0').css('text-align', 'center');
          }

      });

      table.columns().eq(0).each(function(colIdx) {
          $('input', table.column(colIdx).header()).on('keyup change', function() {
              table
                      .column(colIdx)
                      .search(this.value)
                      .draw();
          });




      });



      table.columns().eq(0).each(function(colIdx) {
          $('select', table.column(colIdx).header()).on('change', function() {
              table
                      .column(colIdx)
                      .search(this.value)
                      .draw();
          });

          $('select', table.column(colIdx).header()).on('click', function(e) {
              e.stopPropagation();
          });
      });


      $('#data tbody')
              .on( 'mouseover', 'td', function () {
                  var colIdx = table.cell(this).index().column;

                  if ( colIdx !== lastIdx ) {
                      $( table.cells().nodes() ).removeClass( 'highlight' );
                      $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                  }
              } )
              .on( 'mouseleave', function () {
                  $( table.cells().nodes() ).removeClass( 'highlight' );
              } );


</script>
@endsection
