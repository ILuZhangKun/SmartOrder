<?php
namespace Cash\Model;
use Think\Model;
	/**
	 * 预定模块控制
	 * 1、实现预定功能
	 * 2、取消预定功能
	 * 3、
	 *
	 */
Class TableModel extends Model{
	//构造函数
	Public function __construct(){
		$this->db = M("table");
	}
	/**
	 * [getTableInfo description]
	 * Powered By BJUT
	 * @copyright [MrXiao]
	 * @license   [@BJUT]
	 * @version   [0.1]
	 * @return    [array]   
	 */
	Public function getTableInfo($date){
		$tableModel = new \Admin\Model\TableModel();
		$tableInfo = $tableModel ->GetDegree();
		for ($i=0; $i <count($tableInfo); $i++) { 
			for ($j=0; $j <count($tableInfo[$i]["table"]) ; $j++) { 
				$id=$tableInfo[$i]["table"][$j]["id"];
				//查询检测该桌号是否被预定
				$conBook = array("book_table"=>$id,"book_status"=>0,"book_day"=>$date);
				$book=M("book")->where($conBook)->field("book_day,book_time,book_name")->select();
				//获得预订信息
				if($book!=null){
					$tableInfo[$i]["table"][$j]["type"]="book";
					foreach ($book as $key => $value) {
						$bookInfo = $value["book_day"]."-".$value["book_name"]."预定".$value["book_time"];
						$tableInfo[$i]["table"][$j]["info"].=" ".$bookInfo;
					}  
				}
				//查询检测是否被锁定
				$conTable = array("id"=>$id,"is_lock"=>"1");
				if(M("table")->where($conTable)->count()) {
					// if($date==date("Y-m-d"))
					// 这里为什么要加日期判断???
					$tableInfo[$i]["table"][$j]["type"]="lock";
				}
				if($tableInfo[$i]["table"][$j]["type"]==null) $tableInfo[$i]["table"][$j]["type"]="nomal";
			}
		}
		return($tableInfo);
	}
	/**
	 * 实时查询呼叫信息
	 */
	Public function getHoldInfo(){
		$condition = array("end_time"=>0,"holding"=>array("neq",''));
		$res = M("temp")->where()->field("table_id,holding,hold_time")->select();
		$result = M("table_hall")->where(array("is_lock"=>1))->select(); 
		for($i=0;$i<count($res);$i++){
			$tableId = $res[$i]["table_id"]; 
			$temp = $res[$i]["holding"]; 
			$temp = json_decode(object_array($temp));
	 		// 	$temp = json_decode($temp,true);  
			$temp =explode("***",$temp[0] );  
			$res[$i]["holding"]=$temp; 
			// dump($temp);
			for($j=0;$j<count($result);$j++){ 
				if($result[$j]["id"]==$tableId&&$temp[0]!="")
					$res[$i]["table_name"]=$result[$j]["hall_name"]." ".$result[$j]["table_name"];
			}
		}
		return($res);
	}
	/*
	*获得长时间未结账的餐桌
	 */
	Public function getLongTime(){
		$time =time()-3600*3;
		$condition = array("start_time"=>array("lt",$time));
		$res = M("temp")->where($condition)->field("table_id,start_time")->select();
		$result = M("table_hall")->where(array("is_lock"=>1))->select();
		for($i=0;$i<count($res);$i++){
			$tableId = $res[$i]["table_id"]; 
			$date = $res[$i]["start_time"];
			$res[$i]["start_time"] = "已用餐" .round(($time-$date) / 3600) . "小时";

			for($j=0;$j<count($result);$j++){
				if($result[$j]["id"]==$tableId)
					$res[$i]["table_name"]=$result[$j]["hall_name"]." ".$result[$j]["table_name"];
			}
		}
		return($res);
	}
	 
}
?>