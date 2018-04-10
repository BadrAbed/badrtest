<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\question;
use Auth;
use App\estebyans;
class questioncontroller extends Controller
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
    $name=Auth::user()->name;
  $est= estebyans::where('est_id',request('id'))->get();

  foreach ($est as $key) {
  $user_name=$key->user_name;

  }

  if($user_name==$name){
$res=request('id');
$quest= question::where('est_id',$res)->get();


    return view('addquest')->with(compact('res'))->with(compact('quest'));

  }
  else {
    echo "<script type='text/javascript'>alert('لا يمكنك اضافه اسئله تواصل مع صاحب الاستبيان');
    window.location.href='/estebyans/public/addest';
    </script>";
  }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {

      foreach (request('q_name') as $qname) {

        $quest =new question;
        $quest->est_id=request('est_id');
        $quest->q_name=$qname;
        $quest->save();
        echo "<script type='text/javascript'>alert('تم اضافه الاسئله بنجاح');

        </script>";
      }
return redirect()->back()->with('message','تم اضافه الاسئله بنجاح');
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
  public function destroy()
  {

  question::where('q_id',request('id'))->delete();


return redirect()->back()->with('delet_mass','تم المسح بنجاح');
  }
}
