<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\estebyans;
use App\question;
use App\questionanswers;

class estebyanscontroller extends Controller
{
  public function __construct()
  {
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
    $res= estebyans::all();
    return view('addest',compact('res'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
      $name=request('name');
$res= estebyans::where('est_name',$name)->get();


      $est =new estebyans;
      $est->est_name=request('name');
      $est->user_name=Auth::user()->name;

      $est->save();
      echo "<script type='text/javascript'>alert('تم اضافه الاستبيان بنجاح');
      window.location.href='/estebyans/public/addest';
      </script>";

;

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
    

      if (!$res->isempty()) {
    return view('viewres')->with(compact('res'))->with(compact('est_id'));
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
  public function destroy()
  {
    $name=Auth::user()->name;
 $est= estebyans::where('est_id',request('id'))->get();

 foreach ($est as $key) {
  $user_name=$key->user_name;

}

 if($user_name==$name){
estebyans::where('est_id',request('id'))->delete();

echo "<script type='text/javascript'>alert('تم المسح بناجح');
window.location.href='/estebyans/public/addest';
</script>";

}
 else {
   echo "<script type='text/javascript'>alert('لم يتم المسح تواصل مع صاحب الاستبيان');
   window.location.href='/estebyans/public/addest';
   </script>";
 }

  }
}
