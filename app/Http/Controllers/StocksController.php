<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedIOModel;

class StocksController extends Controller
{
 
	public function __construct(){

		if (session_status() == PHP_SESSION_NONE) {
            
            session_start();
            
        }

		global $medio_model;

		$medio_model = new MedIOModel();

		if(isset($_SESSION['role']) and $_SESSION['role'] == 'buysell'){

			echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

		}elseif(isset($_SESSION['role']) and $_SESSION['role'] == 'patience'){

			echo "<script>window.location.href='http://localhost/careforu/public/patiencedatas';</script>";

		}

	}

	public function view(){

		global $medio_model;

		$result = $medio_model->stocksdb();
		$resultForChart = $medio_model->stocksdbforchart();
		$resultTotalQty = $medio_model->allqtyforchart();

		return view('stocks', ['result'=>$result , 'resultForChart'=>$resultForChart, 'resultTotalQty'=>$resultTotalQty]);

	}

}
