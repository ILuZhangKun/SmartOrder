<?php 
namespace Cash\Model;
use Think\Model;
/*
	管理模块控制器，包括桌子管理、会员管理、职工管理

*/
Class ManageModel extends Model{

	/*
		Part1:桌号管理方法
	*/
	Protected $autoCheckFields = false;//关闭字段信息的自动检测

	//获取厅/桌树数据
	public function GetDegree()
	{
		$hallInfo=M("hall")->where()->select();
        // foreach ($hallInfo as $hallKey => $hallValue) {
        for($i=0;$i<count($hallInfo);$i++){
            $hallId=$hallInfo[$i]["id"];
            // $degreeInfo=$hallValue;
            $condition=array("hall_id"=>$hallId);
            $tableInfo = M("table")->where($condition)->field("id,table_name")->select();
            // dump($tableInfo);die;
            $temp=array();
            if(count($tableInfo)!=0){
                foreach ($tableInfo as $tableKey => $tableValue) { 
                    array_push($temp,$tableValue);
                }
                $hallInfo[$i]["table"]=$temp;
            } 
        }
        return($hallInfo);
	}

	//删除桌号
	public function Del($type,$id)
	{
		//判断厅下桌号是否存在，若存在，则无法删除
		if($type == "hall"){
			if(M("table")->where(array("hall_id"=>$id))->count()){
                return "false";
            }
            else{
                if(M("hall")->where()->delete($id)) return "success";
                else return"error";
            }
        }else{
            if(M("table")->where()->delete($id)) return "success";
                else return"error";
        }
            
        
	}

	//新增厅号
	public function Add($condition,$db)
	{
		 //判断重复机制  
        if(M($db)->where($condition)->count()){ 
            return "error";
        } 
        else{
            $result = M($db)->add($condition);
            if($result) return $result;
        } 
	}

	//修改大厅或者桌名
    Public function Edit($type,$id,$name){
        //修改大厅或者桌名
        if($type!="table"&&$type!="hall") return "type错误";
        $condition = array("id"=>$id); 
        if($type=="table") $data= array("table_name"=>$name);
        else $data= array("name"=>$name);
        if(M($type)->where($condition)->save($data)){
            return "success";
        } 
        else return "error"; 
        
    }

    /*
		Part2:员工管理
    */





















}
?>