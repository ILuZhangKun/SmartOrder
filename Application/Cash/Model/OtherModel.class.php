<?php 
namespace Cash\Model;
use Think\Model;
/**
 *  杂项控制器
 *  
 */
Class OtherModel extends Model{
	//构造函数
	Public function __construct(){
		$this->dbOrder = M("order");
	}
	//获取所有订单
	Public function getAllOrder(){
		$condition = array("isPay"=>0);
		$all = $this->dbOrder->field("oId,orderTime,detail,totalMoney")->where($condition)->select();
		//处理订单详细信息编码格式
		foreach ($all as $key => $value) {
			$all[$key]["detail"] = object_array(json_decode($value["detail"]));
		}
		return $all;
	}
	//查询结账信息
	Public function searchIncome($start,$end,$is_pay){
		$condition = array("order_time"=>array("between",array($start,$end)),
							"is_pay"=>$is_pay);
		$res = M("order")->where($condition)->field("order_time,table_id,total_money as real_money")->select();
		$prefix=C('DB_PREFIX');
		$sql="select t.*,h.name from {$prefix}table as t,{$prefix}hall as h where t.hall_id=h.id ";
		$result = M()->query($sql);
		for($i=0;$i<count($res);$i++){
			$tableId = $res[$i]["table_id"]; 
			$hour = explode(" ", date("Y-m-d h:i:s",$res[$i]["order_time"]));
			$res[$i]["order_time"]=$hour[1];
			for($j=0;$j<count($result);$j++){ 
				if($result[$j]["id"]==$tableId)
					$res[$i]["table_name"]=$result[$j]["name"]." ".$result[$j]["table_name"];
			}
		}
		return $res;

	}

	 


}

 ?>