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
    
	
	<div class="tableNum">
		<div id="menu2" class="menu2">
			<ul>
				<?php if(is_array($tableInfo)): $i = 0; $__LIST__ = $tableInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li class="nav4">
						<a href="javascript:;" class="<?php echo ($cate["name"]); ?>">
							<?php echo ($cate["name"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<?php if(is_array($tableInfo)): $i = 0; $__LIST__ = $tableInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="numBoard" id="<?php echo ($cate["id"]); ?>" type="<?php echo ($cate["name"]); ?>">
				<?php if(is_array($cate["table"])): $i = 0; $__LIST__ = $cate["table"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><button class="btn <?php echo ($v["type"]); ?>" id="<?php echo ($v["id"]); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo ($v["info"]); ?>">
                        <?php echo ($v["table_name"]); ?>
                    </button><?php endforeach; endif; else: echo "" ;endif; ?>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>

	</div>
	<div class="checkoutOther">
		<div class="coBorder">
			<h3>呼叫服务员</h3>
			
			<div id="scrollDiv">
				<ul>
					<?php if(is_array($holdInfo)): $i = 0; $__LIST__ = $holdInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i; if(empty($info)): ?><li>暂时无人呼叫</li>
							<?php else: ?>
							<?php if(is_array($info["holding"])): $i = 0; $__LIST__ = $info["holding"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><?php echo ($info["table_name"]); ?> <?php echo ($val); ?></li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<!--<div class="coBorder">
            <h4>长时间未结账餐台</h4>
            <div id="scrollDiv2">
                <ul>
                    <?php if(is_array($longTime)): $i = 0; $__LIST__ = $longTime;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><?php echo ($val["table_name"]); ?> <?php echo ($val["start_time"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>-->
	</div>
	<!-- /桌号 -->
	<!--弹出框-->
	<div class="modal fade in" id="tableChoose">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
					<h3 class="modal-title" id="exampleModalLabel">选择您的操作：</h3>
				</div>
				<div class="modal-body">
					<label>您将对这个桌子进行以下操作：</label>
					<br>
					<a class="btn btn-success" type="book">预定</a>
					<a class="btn btn-success" type="order">结账</a>
					<a class="btn btn-success" type="other">其他</a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="cancel">取消</button>
				</div>
			</div>
		</div>
	</div>
	<!--弹出框结束-->

	<script>
		$(document).ready(function() {
			var socket;
			var readyState = ["connecting", "connected", "closing", "closed"];
			/* 打开连接事件 */
			//  $("#btn1").click(function() 
			window.onload=function() {
				try {
					/* 连接 */
					socket = new WebSocket("ws://127.0.0.1:8000");

					/* 绑定事件 */
					socket.onopen = function() {
						console.log("连接成功...")
					};

					socket.onmessage = function(e) {
						$("#scrollDiv ul").html($("#scrollDiv ul").html() + "<li>"+ e.data+"</li>");
						
					};
				} catch(exception) {
					$("#scrollDiv").html($("#scrollDiv").html() + "<br />有错误发生");
				}
			};

		});
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