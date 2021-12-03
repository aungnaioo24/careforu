<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedIOModel;

class AddSellController extends Controller
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

    	return view('addsellmed');

    }

    public function addOneSellData(Request $request){

    	global $medio_model;

    	$buyid = $request->input('buyid');
    	$selldate = $request->input('selldate')." ".date('h:i:s');
    	$sellqty = $request->input('sellqty');

    	$result = $medio_model->addoneselldatadb($buyid, $selldate, $sellqty);

    	//return redirect('/');

    }

}
