<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Resources\UserResource;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ajaxcontroller extends Controller
{
    public function index(){
      DB::table('users')->where('id',4)->update([
          'email' => 'taylor@example.com', 'name' => 'nnnn','password'=>'123'

      ]);
      $res=DB::table('users')->get();
      return view('index')->with(compact('res'));
    }
    public function view(){
      $data=User::all();
	   $data= new UserResource(User::all());
      return response($data);
	 
    }
    public function api(){
       return new UserResource(User::find(1));
    }
	 public function store(Request $request){
		 
		   
        
  //$this->upload($request->files);
		$image=$this->upload($request->file('file'));
      $user =new User;
	
	 $user->name=$image;
	  $user->email=$request->email;
	  $user->password=$request->pass;
	  $user->save();
	
	  $data="add";
	  return response($data);
	  
    }
 public function upload($file){
      $extension=$file->getClientOriginalExtension();
      $sha1=sha1($file->getClientOriginalName());
      $filename=date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
    //  dd($filename);
      $path=public_path('images');
      $file->move($path,$filename);
      return 'images/'.$filename;
    }
}
