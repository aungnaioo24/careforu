<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedIOModel;

class FilterController extends Controller
{
    public function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

		global $medio_model;

		$medio_model = new MedIOModel();

		if(isset($_SESSION['role']) and $_SESSION['role'] == 'stockadmin'){

			echo "<script>window.location.href='http://localhost/careforu/public/stocks';</script>";

		}elseif(isset($_SESSION['role']) and $_SESSION['role'] == 'patience'){

			echo "<script>window.location.href='http://localhost/careforu/public/patiencedatas';</script>";

		}

	}

	public function view(){

		global $medio_model;

		$from = date('Y-m-d', strtotime('-1 month'));
		$to = date('Y-m-d');
		$result1 = $medio_model->filterbuymed($from, $to);
		$result2 = $medio_model->filtersellmed($from, $to);

		return view('filter', ['result1'=>$result1, 'result2'=>$result2, 'from'=>$from, 'to'=>$to]);

	}

	public function bydate(Request $request){

		global $medio_model;

		$from = $request->input('from');
		$to = $request->input('to');

		$result1 = $medio_model->filterbuymed($from, $to);
		$result2 = $medio_model->filtersellmed($from, $to);

		return view('filter', ['result1'=>$result1, 'result2'=>$result2, 'from'=>$from, 'to'=>$to]);

	}
}
