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
    
	<div class="table-manage">
		<div class="main-title">
			<h2>桌号管理</h2>
		</div>
		<!-- 表格列表 -->
		<div class="tb-unit posr">
			<div class="tb-unit-bar">
				<!--<a class="btn" onclick="addhall()" href="<?php echo U('add?type=hall');?>">新 增</a>-->
				<a class="addbtn" onclick="addhall()">新 增</a>
			</div>
			<div class="modal-content addhall" id="addhalldiv">
				<p>厅堂名称（名称不能为空）</p>
				<input type="text" id="hall" style="margin-bottom: 5px;" /><br />
				<hr />
				<button class="hallbtn" onclick="addhallsubmit()">确定</button>
				<button class="hallbtn" onclick="addhallreturn()">取消</button>
			</div>
			<div class="category">
				<div class="hd cf">
					<div class="fold">折叠</div>
					<div class="name">名称</div>
				</div>
				<?php if(is_array($degreeInfo)): $i = 0; $__LIST__ = $degreeInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div id="<?php echo ($v["id"]); ?>">
						<div class="cf">
							<div class="btn-toolbar opt-btn cf">
								<a class="confirm ajax-get" href="<?php echo U('del',array('id'=>$v['id'],'type'=>'hall'));?>" title="删除">删除</a>
							</div>
							<div class="fold">
								<i class="icon-unfold"></i>
							</div>
							<div class="name">
								<span class=""></span>
								<input class="table-text" type="text" id="<?php echo ($v["id"]); ?>" value="<?php echo ($v["name"]); ?>" name="title">
								<i class="icon-add"></i>
								<span class="help-inline msg"></span>
							</div>
						</div>
						<?php if($v["table"] == null ): ?><div class="cf" style="display:none">
								<div class="btn-toolbar opt-btn cf">
									<a class="confirm ajax-get" href="<?php echo U('del',array('id'=>$table['id'],'type'=>'table'));?>" title="删除">删除</a>
								</div>
								<div class="fold">
									<i></i>
								</div>
								<div class="name">
									<span class="tab-sign"></span>
									<input class="table-text" type="text" cid="<?php echo ($v["id"]); ?>" id="<?php echo ($table["id"]); ?>" value="<?php echo ($table["table_name"]); ?>" name="title">
									<span class="help-inline msg"></span>
								</div>
							</div>
							<?php else: ?>
							<?php if(is_array($v["table"])): $i = 0; $__LIST__ = $v["table"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><div class="cf">
									<div class="btn-toolbar opt-btn cf">
										<a class="confirm ajax-get" href="<?php echo U('del',array('id'=>$table['id'],'type'=>'table'));?>" title="删除">删除</a>
									</div>
									<div class="fold">
										<i></i>
									</div>
									<div class="name">
										<span class="tab-sign"></span>
										<input class="table-text" type="text" cid="<?php echo ($v["id"]); ?>" id="<?php echo ($table["id"]); ?>" value="<?php echo ($table["table_name"]); ?>" name="title">
										<span class="help-inline msg"></span>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>

					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	<!-- /表格列表 -->
	<script>
		function addhall() {
			document.getElementById('addhalldiv').style.display = "block";
		}

		function addhallsubmit() {
			var hall = document.getElementById('hall').value;
			console.log(hall);
			if(hall==""){
				alert("请输入厅堂名称");
			}
			else{
			$.ajax({
				type: "post",
				dataType: "json",
				data: {
					status: "hall",
					hall: hall
				},
				url: "add",
				success:function(data) {
					console.log(data);
					alert("添加成功");
					window.location.reload();
				},
				error:function(){
					alert("失败");
				}
			});
		}
		}

		function addhallreturn() {
			document.getElementById('addhalldiv').style.display = "none";
		}
	</script>
	<script>
		$(document).ready(function() {
			// $(".msg").hide();
			$(".icon-add").click(function() {
				//得到本次要添加桌位的大厅id
				//				alert("111");
				var cid = $(this).parent().parent().parent().attr("id");
				console.log(cid);
				var parent = $("#" + cid);
				//获得该厅的座位数+1
				var chiNum = parent.children().length;
				$(this).parent().parent().nextAll().show();
				$(this).parent().prev().find("i").attr("class", "icon-unfold");
				//得到最后一个元素的克隆值
				var Element = parent.children().last().clone(true);
				//将可通过来的相关信息置空
				// Element.find("input[name='sort']").val(chiNum);
				Element.removeAttr("style");
				var title = Element.find("input[name='title']");
				if(title.val() != "") {
					title.attr("value", "");
					title.val("");
					title.attr("id", "");
					title.attr("cid", cid);
					Element.find(".opt-btn").hide();
					parent.append(Element);
				}
			});
			//文本框失去焦点则录入信息
			$("[name='title']").change(function() {
				var val = $(this).val();
				var thisId = $(this).attr("id");
				var thisCid = $(this).attr("cid");
				// console.log("name:"+val+"id:"+thisId+"cid:"+thisCid);
				if(val == "" || val == " ") {
					alert("请输入名称");
				} else if(thisId == "" && thisCid != undefined && thisCid != "") {
					//id为空并且cid不是undifined也不是空说明这是新增的桌号。
					//将cid与value录入数据库得到返回的id，将id填充 
					var data = {
						"table_name": val,
						"hall_id": thisCid,
						"status": "table"
					};
					var result = yysAjaxRequest("POST", data, "add");
					var msg = $(this).siblings("span.msg");
					if(result != "error") {
						$(this).attr("id", result);
						msg.attr("style", "color:green;");
						msg.html("添加成功！");
						$(this).parent().siblings(".opt-btn").show();
						$(this).parent().siblings(".opt-btn").attr("href", "/SmartOrder/Admin.php/Table/del/id/" + result + "/type/table.html");
					} else {
						msg.attr("style", "color:red;");
						msg.html("添加失败！");
					}
					setTimeout(function() {
						msg.hide();
					}, 3000);
				} else if(thisCid == undefined) {
					//cid=undefined说明是修改的hall
					var hallName = $(this).val();
					var hallId = $(this).attr("id");
					var msg = $(this).siblings("span.msg");
					edit_name(hallName, hallId, "hall", msg);

				} else if(thisId != "" && thisCid != undefined && thisCid != "") {
					//修改的桌号 
					var name = $(this).val();
					var id = $(this).attr("id");
					var msg = $(this).siblings("span.msg");
					edit_name(name, id, "table", msg);
				}
			});
			//点击折叠icon-fold  
			$(".fold i").click(function() {
				$(this).parent().parent().nextAll().toggle();
				if($(this).hasClass("icon-unfold")) $(this).attr("class", "icon-fold");
				else $(this).attr("class", "icon-unfold");
			});
		});

		function edit_name(name, id, type, msg) {
			var data = {
				"name": name,
				"id": id,
				"type": type
			};
			var result = yysAjaxRequest("POST", data, "edit");

			if(result == "success") {
				msg.attr("style", "color:green;");
				msg.html("修改成功！");
			} else {
				msg.attr("style", "color:red;");
				msg.html("修改失败！");
			}
			setTimeout(function() {
				msg.hide();
			}, 3000);
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