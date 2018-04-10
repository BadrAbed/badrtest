<?php

namespace App\Http\Controllers;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Mail;
use App\Mail\password;
use Illuminate\Support\Facades\Crypt;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('password');
    }

    public function mail()
    {

      $pass=  User::where('email',request('email'))->get();
      foreach ($pass as $pass) {
    //  dd( Crypt::decrypt($pass->password));
     $message=$pass->password;
      }

$message="mmm";
ini_set('max_execution_time', 300); 
      Mail::to(request('email'))

      ->queue(new password($message));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$email=$request->email;
$password=$request->password;

if (Auth::attempt(['email' => $email, 'password' => $password])) {
         // Authentication passed...
         return redirect('/');
     }
else{
  echo "<script type='text/javascript'>alert('user name or password is wrong!');
  window.location.href='/blog/public/';
  </script>";
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
        auth()->logout();
        return redirect('/');
    }
}
