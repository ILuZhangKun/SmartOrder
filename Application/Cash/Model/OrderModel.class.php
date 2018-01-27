<?php 
namespace Cash\Model;
use Think\Model;
/**
 * 前台订单控制Model
 * 主要负责对订单状态的读取，结账处理等操作。
 */
Class OrderModel extends Model{
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
	/**
	 * 订单支付
	 */
	Public function payOrder($tableId,$payType,$realMoney){
		$condition = array("table_id" =>$tableId,"is_pay"=>0);
		$data = array("is_pay" => 1, "pay_type" =>$payType,"real_money"=>"'totle_money'","pay_time" =>time()); 
		// M("order")->where($condition)->save($data);
		// dump(M("order")->getLastSql());die;
		//将temp表中数据删除
		$res1 = M("temp")->where(array("table_id"=>$tableId))->delete();
		// dump(M("temp")->getLastSql());
		$res2 = M("order")->where($condition)->save($data);
		// dump(M("order")->getLastSql());
		// dump($res1."  ".$res2);die;
		if($res1&&$res2){ 
			return success;
		}
		else return false;
	}
	/**
	 * 查询订单
	*/
	Public function searchPay($table_id,$payType){
		$condition = array("table_id" => $table_id,
							"is_pay" => 0); 
		$result=$this->dbOrder->where($condition)->order('order_time desc')->select();
		// if($result==null){
		// 	//在order表中查询结果为空，说明在pad端没有结账，应该去temp表中查找。
		// 	$con = array("order_id"=>0,"table_id" =>$table_id);
		// 	$result = M("temp")->where($con)->select(); 
		// }
		return($result);
	}
	

	/**
	 * [MakeOrder 结账后修改订单状态，解除uuid锁定]
	 * Powered By BJUT
	 * @copyright [MrXiao]
	 * @license   [@BJUT]
	 * @version   [0.1]
	 */
	Public function MakeOrder(){

	}


}

 ?>