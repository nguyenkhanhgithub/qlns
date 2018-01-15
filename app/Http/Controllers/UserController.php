<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
    	# code...
      // $user = User::paginate(1);
    	return view('login');
      // return response()->json($user);
    }

    public function postLogin(Request $request)
    {
    	# code...
    	$this->validate($request,
    		[
    			'txtEmail' => 'required',
    			'txtPassword' => 'required|min:6|max:32'
    		],
    		[
    			'txtEmail.required' => 'Email cannot be empty !',
    			'txtPassword.min'	=> 'Minimum password 6 characters !',
    			'txtPassword.max'	=> 'Maximun password 32 characters !'
    		]
    	);
    	if(Auth::attempt(['email' => $request->txtEmail, 'password' => $request->txtPassword])){
    		return redirect('manage/home/index');
    	}else{
    		return redirect('/')->with('notification','Login unsuccessful !');;
    	}
    }


    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
