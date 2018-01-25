<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html> 
<head>
    <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="A touchable jQuery lightbox plugin for desktop, mobile and tablet" />
    
    <title><?php echo ($meta_title); ?></title>
    <link rel="stylesheet" type="text/css" href="/SmartOrder/Application/Cash/View/Public/css/1.css">
    <link rel="stylesheet" type="text/css" href="/SmartOrder/Application/Cash/View/Public/css/2.css">
    
    <link rel="stylesheet" href="http://swipebox.brutaldesign.com/css/style.css">
	<link rel="stylesheet" href="/SmartOrder/Application/Cash/View/Public/css/swipebox.css">
    
    <!--<link rel="stylesheet" type="text/css" href="/SmartOrder/Application/Cash/View/Public/css/module.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/SmartOrder/Application/Cash/View/Public/css/style.css">-->
    <link rel="stylesheet" type="text/css" href="/SmartOrder/Application/Cash/View/Public/css/bootstrap.min.css">
    <link href="/SmartOrder/Application/Cash/View/Public/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <script src="/SmartOrder/Application/Cash/View/Public/js/jquery-1.10.2.js"></script> 
    <script src="/SmartOrder/Application/Cash/View/Public/js/scroll.js"></script> 
    <script src="/SmartOrder/Application/Cash/View/Public/js/bootstrap.min.js"></script> 
    <script src="/SmartOrder/Application/Cash/View/Public/datetimepicker/js/bootstrap-datetimepicker.js"></script> 
    <script src="/SmartOrder/Application/Cash/View/Public/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script src="/SmartOrder/Application/Cash/View/Public/js/somefunction.js"></script>
    <script src="/SmartOrder/Application/Cash/View/Public/js/1.js"></script>
    
   <!-- <script src="/SmartOrder/Application/Cash/View/Public/js/jquery-1.9.0.min.js"></script>-->
	<script src="/SmartOrder/Application/Cash/View/Public/js/ios-orientationchange-fix.js"></script>
	<script src="/SmartOrder/Application/Cash/View/Public/js/jquery.swipebox.min.js"></script>
    <!--<script type="text/javascript" src="/SmartOrder/Application/Cash/View/Public/js/jquery-2.0.3.min.js"></script>-->
    <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</head>

<body>
    <div class="header">
        <div class="menu">
            <ul>
                <li id="table">
                    <div class="text">桌号</div>
                    <div class="left">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                </li>
                <li id="checkout">
                    <div class="text">结账</div>
                    <div class="left">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                </li>
                <li id="reservation">
                    <div class="text">预约</div>
                    <div class="left">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                </li>
                <li id="manage">
                    <div class="text">管理</div>
                    <div class="nav-bar" style="height: 75px;">
                    	<a href="../manage/index">桌号管理</a><br />
                    	<a href="../manage/employee">员工管理</a>
                    </div>
                    <div class="left">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                </li>
                <li id="other">
                    <div class="text">查询</div>
                    <div class="nav-bar">
                    	<a href="../other/index">账单查看</a><br />
                    	<a href="../other/menulist">菜单查看</a><br />
                    	<a href="../other/adslist">广告查看</a>
                    </div>
                    <div class="left">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="cricle">
                            <div></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="exit"><a href="<?php echo U("Login/logout");?>">退出</a></div>
    </div>
    
	
	<div class="data-table employee">
		<div class="main-title">
		<h2>员工管理</h2>
		</div>
		<table class="employee-table">
			<thead>
				<tr>
					<th class="">ID</th>
					<th class="">用户名</th>
					<th class="">真实姓名</th>
					<th class="">员工号</th>
					<th class="">身份证号</th>
					<th class="">家庭住址</th>
					<th class="">职位</th>
					<th class="">操作</th>
				</tr>
			</thead>
			<tbody >
				<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
						<td ><?php echo ($v["id"]); ?></td>
						<td><?php echo ($v["username"]); ?></td>
						<td><?php echo ($v["realname"]); ?></td>
						<td><?php echo ($v["workid"]); ?></td>
						<td><?php echo ($v["idcardnum"]); ?></td>
						<td><?php echo ($v["address"]); ?></td>
						<td><?php echo ($v["position"]); ?></td>
						<td name=<?php echo ($id=$v["id"]); ?>>
							<a onclick="editEmployee('<?php echo ($v["id"]); ?>','<?php echo ($v["username"]); ?>','<?php echo ($v["realname"]); ?>','<?php echo ($v["workid"]); ?>','<?php echo ($v["idcardnum"]); ?>','<?php echo ($v["address"]); ?>','<?php echo ($v["position"]); ?>')">修改</a> |
							<a onclick="delEmployee('<?php echo ($v["id"]); ?>')">删除</a> 
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
		<!--员工修改div-->
		<div class="modal-content edit-employee" id="edit-employee">
			<input id="id" style="display: none;"/>
			<div class="form-item">
				<label class="item-label">用户名<span class="check-tips">（用户名会作为默认的昵称）</span></label>
				<div class="controls">
					<input type="text" id="username" class="text input-large" name="UserName" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">密码<span class="check-tips">（用户密码不能少于6位）</span></label>
				<div class="controls">
					<input type="password" id="password" class="text input-large" name="Password" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">真实姓名<span class="check-tips"></span></label>
				<div class="controls">
					<input type="text" id="realname" class="text input-large" name="RealName" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">员工编号<span class="check-tips">（可以为空）</span></label>
				<div class="controls">
					<input type="text" id="workid" class="text input-large" name="WorkId" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">身份证号码<span class="check-tips"></span></label>
				<div class="controls">
					<input type="text" id="idcardnum" class="text input-large" name="IdCardNum" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">家庭住址<span class="check-tips">(XX省XX市)</span></label>
				<div class="controls">
					<input type="text" id="address" class="text input-large" name="Address" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">职位<span class="check-tips"></span></label>
				<div class="controls">
					<select name="Position" id="position" style="height: 25px;">
						<?php if(is_array($Position)): foreach($Position as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["position"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>
			<div class="form-item">
				<button class="hallbtn submit-btn" type="submit" onclick="editsubmit()" >确 定</button>
				<button class="hallbtn submit-btn" onclick="divreturn()">取消</button>
			</div>
		
		</div>
	</div>
	<!--新增员工div-->
	<div class="add-employee" id="add-employee">
		<div class="main-title">
		<h3 style="margin:0px auto 10px 50px">添加员工</h3>
		</div>
		<form action="AddEmployee" method="post" class="form-horizontal">
			<div class="form-item">
				<label class="item-label">用户名<span class="check-tips">（用户名会作为默认的昵称）</span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="UserName" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">密码<span class="check-tips">（用户密码不能少于6位）</span></label>
				<div class="controls">
					<input type="password" class="text input-large" name="Password" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">真实姓名<span class="check-tips"></span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="RealName" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">员工编号<span class="check-tips">（可以为空）</span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="WorkId" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">身份证号码<span class="check-tips"></span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="IdCardNum" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">家庭住址<span class="check-tips">(XX省XX市)</span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="Address" value="">
				</div>
			</div>
			<div class="form-item">
				<label class="item-label">职位<span class="check-tips"></span></label>
				<div class="controls">
					<select name="Position" style="height: 25px;">
						<?php if(is_array($Position)): foreach($Position as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["position"]); ?></option><?php endforeach; endif; ?>
					</select>
				</div>
			</div>
			<div class="form-item">
				<button class="hallbtn submit-btn" type="submit" >确 定</button>
				<button class="hallbtn btn-return" type="reset">重置</button>
			</div>
		</form>
	</div>
	<script>
		function editEmployee(id,username,realname,workid,idcardnum,address,positions){
			document.getElementById('edit-employee').style.display="block";
			document.getElementById('id').value=id;
			document.getElementById('username').value=username;
			document.getElementById('realname').value=realname;
			document.getElementById('workid').value=workid;
			document.getElementById('idcardnum').value=idcardnum;
			document.getElementById('address').value=address;
			document.getElementById('position').value=positions;
//			var id=document.getElementById('id').value;
			console.log(id);
//			alert(data);
		}
		function delEmployee(id){
			console.log(id);
			var message=confirm("确定删除该用户？");
			var employee_id=id;
			if(message==true){
				$.ajax({
					type:"post",
					dataType:"json",
					url:"delemployee",
					data:{
						employee_id: employee_id
					},
					success: function(data) {
						alert("删除成功");
						window.location.reload();
					}
				});
			}
		}
		
		function editsubmit(){
			var id=document.getElementById('id').innerHTML;
			var username=document.getElementById('username').value;
			var psword=document.getElementById('password').value;
			var realname=document.getElementById('realname').value;
			var Workid=document.getElementById('workid').value;
			var idcardnum=document.getElementById('idcardnum').value;
			var address=document.getElementById('address').value;
			var positions=document.getElementById('position').value;
			console.log(id);
			console.log(username);
			console.log(psword);
			console.log(realname);
			console.log(Workid);
			console.log(idcardnum);
			console.log(address);
			console.log(positions);
			$.ajax({
				type:"post",
				dataType: "json",
				url: "editemployee",
				data: {
					id: id,
					username: username,
					psword: psword,
					realname: realname,
					Workid: Workid,
					idcardnum: idcardnum,
					address: address,
					positions: positions
				},
				success: function(data) {
					alert("修改成功");
					window.location.reload();
				},
				error: function(){
					alert("修改失败");
				}
			});
		}
		function divreturn(){
			document.getElementById('edit-employee').style.display="none";
		}
	</script>

    <!--弹出框--> 
    <div class="modal fade in" id="alert">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="exampleModalLabel">注意</h3>
                </div>
                <div class="modal-body">
                    请完善您的录入信息，方能进行操作！
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="alertCancel">取消</button> 
                </div>
            </div>
        </div>
    </div> 
    <!--弹出框结束-->
</body> 
</html>