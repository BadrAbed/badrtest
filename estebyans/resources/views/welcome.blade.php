@extends('layouts.app')

@section('content')
<html>
<style>
.back{background-image: url('images/paper.jpg');
opacity:0.5;
}

</style>

<body >





  <table class="table table-bordered" style="text-align:right;">






   <thead>
     <tr >

       <th style="text-align: right;">عرض الاستبيان</th>
       <th style="text-align: right;"> عرض النائج </th>
<th style="text-align: right;">اسم الاستبيان</th>

     </tr>
   </thead>
   <tbody>
     <?php foreach ($est as $est): ?>


     <tr>


       <td>
         <form action="{{route('viewest')}}" method="post"  >

           {{csrf_field()}}
            <input type="hidden" name="est_id" value="{{$est->est_id}}"> </input>
         <input type="submit" value=" عرض الاستبيان" class="btn btn-primary" ></input>
         </form>
          <a href="{{route('view',['est_id'=>$est->est_id])}}" method="get"> fffg</a>
      </td>
       <td>
         <form action="{{route('viewres')}}" method="post" >

           {{csrf_field()}}
            <input type="hidden" name="est_id" value="{{$est->est_id}}"> </input>
         <input type="submit" value="  تعيين النائج" class="btn btn-success" ></input>
         </form>

        </td>
<td> {{$est->est_name}}</td>
     </tr>

<?php endforeach; ?>





</tbody>
</table>

</body>
<html>

@endsection
