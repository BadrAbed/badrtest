<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\estebyans;
use App\question;
use App\questionanswers;
use App\useranswers;
class useranswercontroller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {


    $est =estebyans::all();

return view('welcome',compact('est'));
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


 //echo request('q_id');
    foreach (request('q_id') as $q_id) {
      $quest_ans=questionanswers::where('quest_id',$q_id)->get();

      foreach ($quest_ans as $q_ans_id) {

        # code...
        foreach (request('ansname') as $ans_name) {

          # code...
          if($q_ans_id->ans_name == $ans_name) {
          //  echo $ans_name;
           $useranswer=new useranswers;
            $useranswer->quest_id=$q_id;
            $useranswer->answer_name=$ans_name;
            $useranswer->user_name=Auth::user()->name;
            $useranswer->est_id=request('est_id');
            $useranswer->save();
            echo "<script type='text/javascript'>alert('تم الاستبيان بنجاح ');
            window.location.href='/estebyans/public/';
            </script>";

       }


      }
    }
  }




}
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    $est_id=request('est_id');

      $res= question::where('est_id',$est_id)->get();
      foreach ($res as $key) {

        # code...
      }
      if (!$res->isempty()) {
    return view('viewest')->with(compact('res'))->with(compact('est_id'));
      }
else {
  echo "<script type='text/javascript'>alert('لا توجد اسئله');
  window.location.href='/estebyans/public/';
  </script>";
}
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }
  public function showone()
  {
    $est_id=request('est_id');

      $res= question::where('est_id',$est_id)->get();
      foreach ($res as $key) {

        # code...
      }
      if (!$res->isempty()) {
    return view('viewest')->with(compact('res'))->with(compact('est_id'));
      }
else {
  echo "<script type='text/javascript'>alert('لا توجد اسئله');
  window.location.href='/estebyans/public/';
  </script>";
}  
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
