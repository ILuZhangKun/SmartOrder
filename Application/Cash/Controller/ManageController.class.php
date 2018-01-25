<?php
namespace Cash\Controller;
use Think\Controller;
	/**
	 
	 */
Class ManageController extends CommonController{
	//Paet:桌号管理模块
	Public function index(){
		//获得桌位预定情况
		$table=D("manage");
		$result=$table->GetDegree();
		$this->assign("degreeInfo",$result);
	 	$this->assign("meta_title","管理");
		$this->display("index");
	}

	//桌号删除
	public function del(){
		$type = I("type");
    	if($type!="table"&&$type!="hall") $this->ajaxReturn("删除类型错误！"); 
    	$ret = D("manage")->Del($type,I("id"));
    	
    	if($ret == "success") {
			$this->success('删除成功！');
        }else if($ret == "false"){
            $this->error('请先删除该分类下的子分类');
        } else{
        	$this->error('删除失败！');
        }
	}

	//添加厅号、桌号
	Public function add(){
		if(IS_POST){
			$status = I("status");
			// dump($_POST);DIE;
			if($status=="hall"){ 
				if($_POST["hall"]=="") $this->ajaxReturn("厅堂名称不能为空"); 
				$condition = array("name"=>I("hall"));
				$result = D("manage")->Add($condition,$status);
				if($result!="error") $this->ajaxReturn("厅堂添加成功");
				else $this->ajaxReturn("添加失败！请输入不同的厅堂名称！");
			}
			if($status=="table"){
				$tableName=I("table_name");
				$hallId = I("hall_id");
				$condition = array("table_name" => $tableName,
								 "hall_id" => $hallId
							 );  
				$result=D("manage")->Add($condition,$status);
				$this->ajaxReturn($result,"JSON");
			}
		}
		else{
			$this->ajaxReturn("无值传入！");
		} 
	} 
	

	//修改大厅桌名
    Public function edit(){
    	$type = I("type"); 
    	if($type!="table"&&$type!="hall") $this->ajaxReturn("修改类型错误！"); 
    	$ret = D("manage")->Edit($type,I("id"),I("name"));
    	 $this->ajaxReturn($ret); 
    }

    /*
		Part2:员工管理
    */
	Public function employee(){
		$user = M("user")->select();
		//用于填充用户职位信息！
		$position = M("position")->select();
		foreach ($user as $key => $value) {
			foreach ($position as $k => $v) {
				if($v["id"]==$value["Position"]) $user[$key]["Position"]=$v["Position"];
			}
		}
		$this->assign("Position",$position); 
	 	$this->assign("meta_title","管理");
	 	$this->assign("user",$user)->display("employee");
	}

	//员工信息添加
	public function AddEmployee(){
		if(!IS_POST){
			//获取职位信息，用于前台select选择！
			$this->error("职工信息不能为空！");
		}
		else{
			$data = array("UserName"=>I("UserName"),
						  "PassWord"=>md5(I("Password")),
						  "RealName"=>I("RealName"),
						  "WorkId"=>I("WorkId"),
						  "IdCardNum"=>I("IdCardNum"),
						  "Address"=>I("Address"),
						  "Position"=>I("Position")
						  );
			if(M("user")->add($data)) $this->success("添加成功!");
			else $this->error("添加失败！");
		}
	}


	//员工信息修改
	public function EditEmployee(){
		if(!IS_POST){
			//获取职位信息，用于前台select选择！
			$this->ajaxReturn("职工信息不能为空！");
		}
		else{
			// dump($_POST);
			//获取入库的数据！
			$data = array(
						  "UserName"=>I("username"),
						  "PassWord"=>md5(I("psword")),
						  "RealName"=>I("realname"),
						  "WorkId"=>I("Workid"),
						  "IdCardNum"=>I("idcardnum"),
						  "Address"=>I("address"),
						  "Position"=>I("positions")
						  );
			$condition=array("id"=>I("id"));
			if(M("user")->where($condition)->save($data)) $this->ajaxReturn("添加成功!");
			else $this->ajaxReturn("添加失败！");
		}
	}

	//员工信息删除
	public function DelEmployee(){
		if(IS_POST){
			$condition["id"]=I("employee_id");
			if($res=M("user")->where($condition)->delete())	$this->ajaxReturn("员工信息删除成功！");
			else $this->ajaxReturn("删除失败！");
		}
		else $this->ajaxReturn("无员工id传入！");
	}







}

?>