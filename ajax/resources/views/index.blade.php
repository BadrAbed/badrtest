<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<h3 id="error-info"></h3>
   <input required="" type="file" name="result_file" id="result_file" />

<div class="form-group row add">
    <div class="col-md-8">
     name:   <input type="text" class="form-control" id="name" name="name"
            placeholder="Enter some name" required>
        <p class="error text-center alert alert-danger hidden"></p>
    </div>
	                        

	<div class="col-md-8">
     pass :   <input type="password" class="form-control" id="pass" name="pass"
            placeholder="Enter password" required>
        <p class="error text-center alert alert-danger hidden"></p>
    </div>
	<div class="col-md-8">
    email:    <input type="email" class="form-control" id="email" name="email"
            placeholder="Enter email" required>
        <p class="error text-center alert alert-danger hidden"></p>
    </div>

    <div class="col-md-4">
        <button class="btn btn-primary" type="submit" id="add">
            <span class="glyphicon glyphicon-plus"></span> ADD
        </button>
    </div>
</div>
 {{ csrf_field() }}
<table>

  <button  class="btn btn-info" id="getdata" > get data</button>
</thead>
<tr>
  <td>id </td>
  <td>name</td>
  <td>email</td>
  <td>view</td>
</tr>

<tbody id="user-info">
</tbody>
</thead>
</table>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

//setInterval(get_fb, 5);

$( document ).ready(function() {

$.get("{{route('getdata')}}",function(data){
    $('#user-info').empty();
	 console.log(data);
  $.each(data,function(i,value){
	  var imge=value.name;
    var tr=$("<tr/>")
    tr.append($("<td/>",{
      text:value.id,

    })).append($("<td/>",{
      // text:imge,
	   html: "<img src='"+value.name+"' ></img>",
 

      }))
      .append($("<td/>",{
          text:value.email

        }))
        .append($("<td/>",{
            html:"<a href=''> view</a>"

          }))
    $('#user-info').append(tr);
  });
});
});


$("#add").click(function(data) {
	  

if(!$('input[name=name]').val()){
				  $("#error-info").append("<b>add name</b><br></br>");
}
if(!$('input[name=pass]').val()){
				    $("#error-info").append("<b>add pass</b><br></br>");
}
if(!$('input[name=email]').val()){
				    $("#error-info").append("<b>add email</b><br></br>");
}
	 var file_data = $('#result_file').prop('files')[0];
	 var _token =$('input[name=_token]').val();
	  var name= $('input[name=name]').val();
		var 	pass= $('input[name=pass]').val();
		var 	email= $('input[name=email]').val();
	 var form_data = new FormData();
        form_data.append('file', file_data);
         form_data.append('_token', _token);
form_data.append('name', name);
form_data.append('pass', pass);
form_data.append('email', email);
    $.ajax({
		
        type: 'POST',
      url: 'http://localhost/ajax/public/add',
        data: form_data, /*{
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val(),
			'pass': $('input[name=pass]').val(),
			'email': $('input[name=email]').val(),
			'image': file,*/
		  contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
		
		  success: function(data) {
			  alert("add done ");
            },
			 
		error: function(data) {
			  alert("some error  ");
            },
	
		
		
	
   })});
  
   
</script>
