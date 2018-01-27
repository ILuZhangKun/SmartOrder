<?php
namespace Cash\Controller;
use Think\Controller;
	 
Class TableController extends CommonController{
	//显示桌号
	public function showTable(){
		$holdInfo = D("Table")->getHoldInfo();
		$longTime = D("Table")->getLongTime();
		$this->assign('longTime',$longTime);
		$this->assign('holdInfo',$holdInfo);
		$day=I("date"); 
		$day=$day==""?date("Y-m-d"):$day;  
		$tableInfo=D("Table")->getTableInfo($day); 
		$this->assign("tableInfo",$tableInfo);
		$this->assign("meta_title","桌号");
		$this->display("index");
	}
}
	 
?>