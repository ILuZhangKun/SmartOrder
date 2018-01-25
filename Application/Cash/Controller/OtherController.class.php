<?php 
namespace Cash\Controller;
use Think\Controller;
/**
 * 订单控制器
 */
Class OtherController extends CommonController{

	/*
		查询模块控制器
		Author:侯自强
		Date：2018.1.23
	*/

	/*
		Part1:查询账单模块

	*/
	Public function index(){
		//点击查询账单首页
		$this->searchIncome();

	}
	Public function searchIncome(){
		//执行查询指定日期账单
		$day = I("incomeDay");
		$day=$day==""?date("Y-m-d"):$day; 
		// dump($day);die;
		//dump($day);
		$start = strtotime($day);
		$end = strtotime("+1 day",$start); 
		//dump($start);dump($end);die;
		$res = D("other")->searchIncome($start,$end,0);
		$nopay_res=D("other")->searchIncome($start,$end,1);
		$total=0;
		foreach ($res as $key => $value) {
			$total+=$res[$key]['real_money'];
		}
		$this->assign("total",$total);
		//1506330072
		$this->assign("meta_title","查询");
		$this->assign("date",$day);
		$this->assign("result",$res);
		$this->assign("result_nopay",$nopay_res);
		$this->display("index");
	}

	/*
		Part2:查询菜单
	*/
	Public function menulist(){
		//菜系查询
		$CookStyle=M("cookstyle")->where("is_delete = 0")->select();
		if(I('styleid')){
			$styleid=I('styleid');
			$this->assign("cid",$styleid);
		}
		else{
			$styleid=$CookStyle[0]["c_id"];
		}
		$cook=$this->SearchMenu($styleid);
		$this->assign("CookStyle",$CookStyle);
	 	$this->assign("meta_title","查询");
		$this->assign("CookMenu",$cook);
		$this->display("menulist");
	}

	//查询菜系所对应的菜单
	public function SearchMenu($styleid)
	{
		$condition["is_delete"] = array("neq",1);
		$cook = M("cookmenu")->field("cookname,stylename,picture,so_cookmenu.id,price,standard,recommend,styleid")
		->join("so_cookstyle on so_cookmenu.styleid=so_cookstyle.c_id")
		->where("so_cookmenu.is_delete != 1 and so_cookmenu.styleid={$styleid}")->select();
		return $cook;
	}




	/*
		Part3:广告信息查看
	*/
	Public function adslist(){
		$date = date("Y-m-d");
		$ltdate['endtime']  = array('lt',$date);
		$ltdata['is_delete'] = 1;
		M("ads")->where($ltdate)->save($ltdata);
		$gtdate['endtime']  = array('gt',$date);
		$gtdata['is_delete'] = 0;
		M("ads")->where($gtdate)->save($gtdata);
		$Ads_list = M("ads")->where()->select();
		$this->assign("list",$Ads_list);
	 	$this->assign("meta_title","查询");
		$this->display("adslist");
	}
}
?>
