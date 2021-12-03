<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class MedIOModel
{

	public function getbuymed($date){

		$result = DB::table('buydata')
					->join('medicines', 'buydata.buy_med_id', 'medicines.id')
					->select('medicines.name', 'medicines.medname', 'medicines.sell_point', 'medicines.or_price', 'medicines.sell_price', 'buydata.buy_date', 'buydata.exp_date', 'buydata.buy_qty')
					->where(DB::raw('date(buydata.buy_date)'), $date)
					->get();

		return $result;

	}

	public function getsellmed($date){

		$result = DB::table('selldata')
					->join('medicines', 'selldata.sell_med_id', 'medicines.id')
					->join('buydata', 'selldata.sell_buy_id', 'buydata.buy_id')
					->select('medicines.name', 'medicines.medname', 'medicines.sell_point', 'medicines.or_price', 'medicines.sell_price', 'selldata.sell_date', 'buydata.exp_date', 'selldata.sell_qty')
					->where(DB::raw('date(selldata.sell_date)'), $date)
					->get();

		return $result;

	}

	public function filterbuymed($from, $to){

		$result = DB::table('buydata')
					->join('medicines', 'buydata.buy_med_id', 'medicines.id')
					->select('medicines.name', 'medicines.medname', 'medicines.sell_point', 'medicines.or_price', 'medicines.sell_price', 'buydata.buy_date', 'buydata.exp_date', 'buydata.buy_qty')
					->whereBetween(DB::raw('date(buydata.buy_date)'), [$from, $to])
					->get();

		return $result;

	}

	public function filtersellmed($from, $to){

		$result = DB::table('selldata')
					->join('medicines', 'selldata.sell_med_id', 'medicines.id')
					->join('buydata', 'selldata.sell_buy_id', 'buydata.buy_id')
					->select('medicines.name', 'medicines.medname', 'medicines.sell_point', 'medicines.or_price', 'medicines.sell_price', 'selldata.sell_date', 'buydata.exp_date', 'selldata.sell_qty')
					->whereBetween(DB::raw('date(selldata.sell_date)'), [$from, $to])
					->get();

		return $result;

	}

	public function getmednames(){

		$result = DB::table('medicines')
					->select('name', 'id')
					->where('del_status', 0)
					->get();

		return $result;

	}

	public function addonebuydatadb($id, $buydate, $expdate, $buyqty){

		$result1 = DB::table('buydata')
					->insert([
						'buy_med_id'=>$id,
						'buy_date'=>$buydate,
						'exp_date'=>$expdate,
						'buy_qty'=>$buyqty
					]);

		if($result1>0){

			$result2 = DB::table('stocks')
						->select('stocks_id', 'qty')
						->where([
							['stocks_med_id', '=', $id],
							['stocks_exp_date', '=', $expdate]
						])
						->get();

			$count = 0;

			foreach($result2 as $data){

				++$count;
				$stockid = $data->stocks_id;
				$qty = $data->qty;

			}

			if($count>0){

				$result3 = DB::table('stocks')
							->where('stocks_id', $stockid)
							->update(['qty'=>($qty+$buyqty)]);

				return redirect('/');

			}else{

				$result3 = DB::table('stocks')
							->insert([
								'stocks_med_id'=>$id,
								'stocks_exp_date'=>$expdate,
								'qty'=>$buyqty
							]);

				return redirect('/');

			}

		}

	}

	public function addoneselldatadb($buyid, $selldate, $sellqty){

		$result1 = DB::table('buydata')
					->select('buy_med_id', 'buy_qty', 'exp_date', 'remain_qty')
					->where('buy_id', $buyid)
					->first();

		$buyqty = $result1->buy_qty;
		$medid = $result1->buy_med_id;
		$expdate = $result1->exp_date;
		$remain_qty = $result1->remain_qty;

		if($sellqty<=$remain_qty){
			
			$result2 = DB::table('selldata')
						->insert([
							'sell_med_id'=>$medid,
							'sell_buy_id'=>$buyid,
							'sell_date'=>$selldate,
							'sell_qty'=>$sellqty
						]);

			if($result2>0){

				$result3 = DB::table('stocks')
							->select('stocks_id', 'qty')
							->where([
								['stocks_med_id', '=', $medid],
								['stocks_exp_date', '=', $expdate]
							])
							->first();

				$stockid = $result3->stocks_id;
				$qty = $result3->qty;

				$result4 = DB::table('stocks')
							->where('stocks_id', $stockid)
							->update(['qty'=>($qty-$sellqty)]);

				$result5 = DB::table('buydata')
							->where('buy_id', $buyid)
							->update(['remain_qty'=>($remain_qty-$sellqty)]);

				echo "<script>window.location.href='http://localhost/careforu/public/';</script>";

			}

		}else{

			echo "<script>window.alert('Not Enough. Total Quantity Left is ".$remain_qty.".'); window.location.href='http://localhost/careforu/public/addselldata';</script>";

		}

	}

	public function stocksdb(){

		$result = DB::table('stocks')
					->join('medicines', 'stocks.stocks_med_id', 'medicines.id')
					->select('name', 'stocks_exp_date', 'qty')
					->get();

		return $result;

	}

	public function stocksdbforchart(){

		$result = DB::table('stocks')
					->join('medicines', 'medicines.id', '=', 'stocks.stocks_med_id')
					->select('name', DB::raw('SUM(qty) as qty'))
					->groupBy('stocks.stocks_med_id')
					->get();

		return $result;

	}

	public function allqtyforchart(){
		$result = DB::table('stocks')
					->select(DB::raw('SUM(qty) as totalqty'))
					->first();

		return $result;
	}

	public function nearexpstocksdb(){

		$from = date('Y-m-d');
		$to = date('Y-m-d', strtotime('+1 month'));

		$result = DB::table('stocks')
					->join('medicines', 'stocks.stocks_med_id', 'medicines.id')
					->select('name', 'stocks_exp_date', 'qty')
					->whereBetween(DB::raw('date(stocks.stocks_exp_date)'), [$from, $to])
					->get();

		return $result;

	}

}