<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    
	public function logout(){

		if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        	}

		session_destroy();

		echo "<script>window.location.href='http://localhost/careforu/public/login';</script>";

	}

}
