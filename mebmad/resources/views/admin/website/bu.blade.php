<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<div class="container">



          <?php foreach ($bu as $bu): ?>
            <div class="row">

                <div class="col-md-2">

              <div class="thumbnail" >
                <img src="http://tech.firstpost.com/wp-content/uploads/2014/09/Apple_iPhone6_Reuters.jpg" alt="" class="img-responsive">
                <div class="caption">
                  <h4 class="pull-right">${{$bu->bu_price}}</h4>
                  <h4><a href="#">{{$bu->bu_name}}</a></h4>
                  <p>{{$bu->bu_desc}}</p>
                </div>
                <div class="space-ten"></div>
             <div class="btn-ground text-center">
                 <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> bu details</button>

             </div>
             <div class="space-ten"></div>
           </div>
         </div>

         <?php endforeach; ?>
              </div>


    </div>
</div>
