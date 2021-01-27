<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    
	public function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

		global $usermodel;

		$usermodel = new UserModel();

	}

	public function view(){

		global $usermodel;

		return view('login');

	}

	public function check(Request $request){

		global $usermodel;

		$name = $request->input('name');
		$pass = $request->input('pass');

		$result = $usermodel->checkdb($name, $pass);

	}

}
