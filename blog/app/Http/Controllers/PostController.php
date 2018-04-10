<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\post;

use App\commentes;
class PostController extends Controller

{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('add');
  }
  public function store()
  {
    if (request('image')!==null) {
  $image=  $this->upload(request('image'));

       }
   else {
   $image='image/default.jpg'; }
$post =new post;
$post->title=request('title');
$post->body=request('body');
$post->image=$image;
$post->user_id=request('user_id');
$post->save();

return redirect('/');
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

  public function show()
  {

    //$post =new post;
    $res=post::orderBy('created_at','DESC')->get();
     $comments=commentes::orderBy('created_at','DESC')->get();
    return view('index')->with(compact('res'))->with(compact('comments'));
  }
  public function showpost()
  {
$post =new post;
$id=request('id');

   $res=post::where('id',$id)->get();
$comments =new commentes;
$comment=commentes::all();

    return view('view')->with(compact('res'))->with(compact('comment'));
  }
  public function destroy()
  {
    $id=request('id');
   $res=post::where('id',$id)->get();

    $post=new post;
    foreach ($res as $res) {
    $userid=$res->user_id;
    }
    if(Auth::user()->id == $userid){
    post::where('id',$id)->delete();
  return redirect('/');
}
else {
  echo "<script type='text/javascript'>alert('failed!');
  window.location.href='/blog/public/';
  </script>";
}
  }

  public function edit(){
    $id=request('id');
       //dd($id);
    return view('editpost',compact('id'));
  }
  public function update(){
    $id=request('id');
    $res=post::where('id',$id)->get();
    if (request('image')!==null) {
  $image=  $this->upload(request('image'));

       }
   else {
   $image='image/default.jpg'; }
     $post=new post;
     foreach ($res as $res) {
     $userid=$res->user_id;
     }
     if(Auth::user()->id == $userid){
       $post= post::find($id);
       $post->title=request('title');
       $post->body=request('body');
       $post->image=$image;
       $post->save();
       return redirect('/');
     }
     else {
       echo "<script type='text/javascript'>alert('call the owner plz!');
       window.location.href='/blog/public/';
       </script>";
     }


  }
}
