<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedIOModel;

class DailyController extends Controller
{

	public function __construct(Request $request){

		if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

		global $medio_model;

		$medio_model = new MedIOModel();

		if(isset($_SESSION['role']) and $_SESSION['role'] == 'stockadmin'){

			echo "<script>window.location.href='http://localhost/careforu/public/stocks';</script>";

		}elseif(isset($_SESSION['role']) and $_SESSION['role'] == 'patience'){

			echo "checkkkk";

			echo "<script>window.location.href='http://localhost/careforu/public/patiencedatas';</script>";

		}

	}

	public function view(){

		global $medio_model;

		$date = date('Y-m-d');
		$result1 = $medio_model->getbuymed($date);
		$result2 = $medio_model->getsellmed($date);

		return view('main', ['result1'=>$result1, 'result2'=>$result2, 'date'=>$date]);

	}

	public function bydate(Request $request){

		global $medio_model;

		$date = $request->input('date');

		$result1 = $medio_model->getbuymed($date);
		$result2 = $medio_model->getsellmed($date);

		return view('main', ['result1'=>$result1, 'result2'=>$result2, 'date'=>$date]);

	}

}
