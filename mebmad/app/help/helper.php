<?php
 function getsitename(){

  return \App\sitesittings::Where('id',1)->get()[0]->sitename;
}

function bu_type(){
	$array=[
	 'apartment',
	 'villa',
	 'home',
	 'house'
	 
	];
return $array;	
}