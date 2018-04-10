<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class admin extends Controller
{
  public function index(){
    return view('admin.home.home');
  }
}
