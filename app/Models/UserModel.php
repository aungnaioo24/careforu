<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UserModel{

	public function checkdb($name, $pass){

		$result = DB::table('user')
					->select('u_id', 'u_role', 'u_pass')
					->where([
						['u_name', '=', $name],
						['u_ban_status', '=', 0]
					])
					->first();

		if($result){

			if(password_verify($pass, $result->u_pass)){
				
				$role = $result->u_role;

				if($role == 'super'){

					$_SESSION['role'] = 'super';

					echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

				}elseif($role == 'buysell'){

					$_SESSION['role'] = 'buysell';

					echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

				}elseif($role == 'stockadmin'){

					$_SESSION['role'] = 'stockadmin';

					echo "<script>window.location.href='http://localhost/careforu/public/stocks';</script>";

				}elseif($role == 'patience'){

					$_SESSION['role'] = 'patience';

					 echo "<script>window.location.href='http://localhost/careforu/public/patiencedatas';</script>";

				}

			}else{
				echo "<script>window.alert('Wrong Password!!'); window.location.href='http://localhost/careforu/public/login';</script>";
			}

		}else{

			echo "<script>window.alert('Wrong User!!'); window.location.href='http://localhost/careforu/public/login';</script>";

		}

	}

}