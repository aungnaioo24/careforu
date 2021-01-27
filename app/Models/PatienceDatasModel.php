<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class PatienceDatasModel{

	public function getpatiencedatadb(){

		$result = DB::table('patiencedatas')
					->join('patiences', 'patiencedatas.pt_p_id', 'patiences.p_id')
					->select('p_id', 'p_name', 'p_nrc', 'pt_date', 'pt_bloodtest', 'pt_urinetest')
					->get();

		return $result;

	}

	public function getpatiencecvbd($id){

		$result = DB::table('patiences')
					->select('p_name', 'p_father', 'p_age', 'p_nrc', 'p_phone', 'p_address')
					->where('p_id', $id)
					->first();

		return $result;

	}

}