<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questionanswers;
use App\Http\Requests;

class questanswercontroller extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
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
  $est_id=request('est_id');
  $quest_id=request('quest_id');
  $quest_ans=questionanswers::where('quest_id',$quest_id)->get();
  return view('addans')->with(compact('est_id'))->with(compact('quest_id'))->with(compact('quest_ans'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    foreach (request('ans_name') as $name) {
      # code...


      $ans =new questionanswers;
      $ans->quest_id=request('quest_id');
      $ans->ans_name=$name;
      $ans->est_id=request('est_id');
      $ans->save();

}
return redirect()-> back()->with('message','تم اضافه الاجابه بنجاح');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
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
