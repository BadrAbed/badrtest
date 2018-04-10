<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\buillding;
class builldingcontroller extends Controller
{
    public function index(){
$bu = buillding::all();
		return view ('admin.bu.index')->with(compact('bu'));
	}
  public function create(){

  return view ('admin.bu.create');
}
public function store(){
$bu = buillding::all();
return view ('admin.bu.index')->with(compact('bu'));
}
public function showall(){
$bu = buillding::where('bu_state',1)->get();
return view ('admin.website.side')->with(compact('bu'));
}
}
