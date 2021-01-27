<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatienceDatasModel;

class PatienceDatasController extends Controller
{
    
	public function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

		global $pdatamodel;

		$pdatamodel = new PatienceDatasModel();

		if(isset($_SESSION['role']) and $_SESSION['role'] == 'buysell'){

			echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

		}elseif(isset($_SESSION['role']) and $_SESSION['role'] == 'stockadmin'){

			echo "<script>window.location.href='http://localhost/careforu/public/stocks';</script>";

		}

	}

	public function view(){

		global $pdatamodel;

		$result = $pdatamodel->getpatiencedatadb();

		return view('patiencedatas', ['result'=>$result]);

	}

}
