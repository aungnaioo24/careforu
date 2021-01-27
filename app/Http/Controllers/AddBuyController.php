<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedIOModel;

class AddBuyController extends Controller
{
    //
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
    	$result = $medio_model->getmednames();

    	return view('addbuymed', ['result'=>$result]);

    }

    public function addOneBuyData(Request $request){

    	global $medio_model;

    	$id = $request->input('name');
    	$buydate = $request->input('buydate')." ".date('h:i:s');
    	$expdate = $request->input('expdate')." 00:00:00";
    	$buyqty = $request->input('buyqty');

    	$result = $medio_model->addonebuydatadb($id, $buydate, $expdate, $buyqty);

    	return redirect('/');

    }

}
