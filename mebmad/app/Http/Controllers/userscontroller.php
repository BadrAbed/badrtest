<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

use App\User;
use Excel;
class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users= User::all();

  return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $req)
    {
      $user =new User;

      $messages = [
          'same'    => 'The :attribute and :other must match.',
          'size'    => 'The :attribute must be exactly :size.',
          'between' => 'The :attribute value :input is not between :min - :max.',
          'in'      => 'The :attribute must be one of the following types: :values',
      ];
      $valid =Validator::make(request()->all(), [
          'name' => 'required|max:20',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6',
      ],$messages);

      $errors = $valid->errors();
if(!$errors->isempty()){
  echo  $errors->first('name');
  echo "<br></br>";
  echo $errors->first('email');
  echo "<br></br>";
  echo $errors->first('password');

}

else {
  $user::create(request()->all());
  return back()->withFlashMessage('add user done');
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
      $users= User::all();
      if(request('search')!=""){

      $search=User::where('name','like','%'.request('search').'%')->get();
        return view('admin.users.index')->with(compact('search'))->with(compact('users'));

}
else {
    return view('admin.users.index')->withMessage('not found');
}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $user=User::where('id',request('id'))->get();
      return view('admin.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        $res=User::find(request('id'));
        $type=request('type');

        $res->name=request('name');
        if ($type=1) {
        $res->admin=1;
        }
        if ($type=2) {
        $res->admin=0;
        }
        $res->email=request('email');
        $res->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        User::where('id',request('id'))->delete();
        return back();
    }

	public function excel(){

		Excel::create('users',function($excel){
			$excel->sheet('users',function($sheet){
		$sheet->loadview('admin.users.data');
		});
		})->export('xlsx');


	}
}
