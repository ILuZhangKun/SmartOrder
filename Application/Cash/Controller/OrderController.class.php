<?php
namespace Cash\Controller;
use Think\Controller;
/**
 * 订单控制器
 */
Class OrderController extends CommonController{
	Public function index(){
		//获得座位信息
		// $data=I("table_id");
		// if($data!=null)
		// {
		// 	getSearch();
		// }
		$tableTree = D("table")->getTableInfo();
		// $holdInfo = D("order")->getHoldInfo();
		// $longTime = D("order")->getLongTime();
		// $this->assign('longTime',$longTime);
		// $this->assign('holdInfo',$holdInfo);
		$this->assign("tableTree",$tableTree);
		$this->assign("meta_title","结账");
		$this->display("index");
	}

	
	Public function getSearch(){
		$this->assign("meta_title","结账");
		if(IS_GET){
			$table_id = I("tableid");
			if(empty($table_id)) $this->error("请输入桌号进行查询");
			$order = D("order");
			$orderInfo = $order->searchPay($table_id);
			// dump($orderInfo);die;
			if($orderInfo!=null){
				$payInfo=json_decode($orderInfo[0]["detail"]);
				//获取解析后的菜单信息
				$payItem = array();
				$totle=0;
				for($i=0;$i<count($payInfo);$i++){
					$payItem[$i]["id"]=$table_id;
					$payItem[$i]["name"]=$payInfo[$i]->name;
					$payItem[$i]["price"]=$payInfo[$i]->price;
					$payItem[$i]["num"]=$payInfo[$i]->num;
					$payItem[$i]["totle"]=$payItem[$i]["price"] * $payItem[$i]["num"];
					$totle+=$payItem[$i]["totle"];
				}
				
				$t = time();
				$pay_time = date("Y-m-d H:i:s",$t);
				$this->assign("oid",$orderInfo[0]["oid"]);
				$this->assign("pay_time",$pay_time);
				$this->assign("tableId",$table_id);
				$this->assign("payInfo",$payItem);
				$this->assign("totle",$totle);
			}

		}else{
			$this->error("请选择桌号！");
		}
		$this->index();
	}
	//结账+同步
	 public function payBill(){

       $data['pay_type'] = I('paytype');
       $data['is_pay'] = '1';
       $data2['uuid'] = "";
       $data2['is_lock'] = "0";
       $oid = I('oid');
       $tid = I('tableid');
       
        //删除temp表，并更新order表；解除锁定
       M('temp')->where("table_id = $tid")->delete();
       //订单表修改支付状态，添加支付类型，将is_pay修改为1(已支付)
       if(M('order')->where("oid = $oid")->save($data) && M('table')->where("id = $tid")->save($data2)){
       //解绑桌号
       //找到已支付和未同步的订单	
       $data3 = array("is_pay"=>1,"syn_check"=>0);
       $syn_order = M('order')->where($data3)->select();
       //同步操作
       $message = "syn_check更新测试！".date("Y-m-d H:i:s",time());
       $cloud_ip = getConfig("cloud_ip");
       $syn_key = getConfig("synKey");
       //2、开始同步操作
       $syn_url="http://".trim($cloud_ip)."/Cloud/SynData/Order/synOrder";//生成同步URL
       $data4["syn_key"] = $syn_key; //构造同步数据
       $data4["syn_order"] = serialize($syn_order);
       $order_return = object_array(json_decode(curl_request($syn_url,$data4)));
       if($order_return["status"] == 1)
        //如果更新成功，同时修改本地服务器的数据
       {
           $data['syn_check'] = '1';
           $data['pay_time']=time();
           if(M('order')->where($data3)->save($data))
           {
           		$this->ajaxReturn("success");
           }
           else
           {
               $this->ajaxReturn("syn_error");
           }
       }
       else
       {
          $this->ajaxReturn("cloud_error");
       }
   }
   else $this->ajaxReturn("pay_error");
}


	// //结账
	// Public function payBill(){
	// 	$this->assign("meta_title","结账");
	// 	$tableId = I("tableid");
	// 	$payType = I("paytype");
	// 	$realMoney = I("realMoney");
	// 	$order = D("order");
	// 	$res = $order->payOrder($tableId,$payType,$realMoney);
	// 	 $this->ajaxReturn($res);
	// }

}
?>
