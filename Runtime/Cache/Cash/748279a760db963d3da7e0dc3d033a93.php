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
    
	<div class="data-table menu-list">
		<div class="main-title">
			<h2>菜单列表</h2>
		</div>
		<form action="menulist" type="post">
			<select name="styleid" class="menu-thing">
				<?php if(is_array($CookStyle)): foreach($CookStyle as $key=>$v): if($v["c_id"] == $cid ): ?><option value="<?php echo ($v["c_id"]); ?>" selected="true"><?php echo ($v["stylename"]); ?></option>
						<?php else: ?>
						<option value="<?php echo ($v["c_id"]); ?>"><?php echo ($v["stylename"]); ?></option><?php endif; endforeach; endif; ?>
			</select>
			<button class="btn btn-success">查询</button>
		</form>
		<table>
			<thead>
				<tr>
					<th class="">ID</th>
					<th class="">所属菜系</th>
					<th class="">菜名</th>
					<th class="">单价</th>
					<th class="">规格</th>
					<th class="">置顶</th>
					<!--<th >操作</th>-->
					<th>菜品图片</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($CookMenu)): foreach($CookMenu as $k=>$v): ?><tr>
						<td><?php echo ($k+1); ?></td>
						<td><?php echo ($v["stylename"]); ?></td>
						<td><?php echo ($v["cookname"]); ?></td>
						<td><?php echo ($v["price"]); ?></td>
						<td><?php echo ($v["standard"]); ?></td>
						<td>
							<?php if($v["recommend"] == 0): ?>否
							<?php else: ?>是<?php endif; ?>
						</td>
						<!--<td name=<?php echo ($id=$v["id"]); ?>> -->
						<td <?php echo ($cookname=$v["cookname"]); ?>>
							<a href="<?php echo ($v["picture"]); ?>" class="swipebox">
								<img src="<?php echo ($v["picture"]); ?>" width="70px" height="70px" style="cursor: pointer;"/>
							</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>

	</div>
	
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
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