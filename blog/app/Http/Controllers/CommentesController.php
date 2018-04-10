<?php

namespace App\Http\Controllers;
use Auth;
use App\commentes;
use Illuminate\Http\Request;

class CommentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    $comment=new commentes;
    $comment->body=request('body');
    $comment->post_id=request('post_id');
$comment->user_id=request('user_id');
    $comment->save();
     return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\commentes  $commentes
     * @return \Illuminate\Http\Response
     */
    public function show(commentes $commentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commentes  $commentes
     * @return \Illuminate\Http\Response
     */
    public function edit(commentes $commentes)
    {
        $id=request('id');
        return view('editcomments',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\commentes  $commentes
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
      $id=request('id');

      $res=commentes::where('id',$id)->get();

       $comment=new commentes;
       foreach ($res as $res) {
       $userid=$res->user_id;
       }
       if(Auth::user()->id == $userid){
         $comment= commentes::find($id);
         $comment->body=request('body');
         $comment->save();
         return redirect('/');
       }
       else {
         echo "<script type='text/javascript'>alert('call the owner plz!');
         window.location.href='/blog/public/';
         </script>";
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\commentes  $commentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(commentes $commentes)
    {
      $id =request('id');
      $comments =new commentes;
        $res=commentes::where('id',$id)->get();
        foreach ($res as $res) {
        $userid=$res->user_id;
        }

      if(Auth::user()->id == $userid ){
    commentes::where('id',$id)->delete();
    return back();
  }
else{

  echo "<script type='text/javascript'>alert('failed!');
  window.location.href='/blog/public/';
  </script>";
}
    }
}
