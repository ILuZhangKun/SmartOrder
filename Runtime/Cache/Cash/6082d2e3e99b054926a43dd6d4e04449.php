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
    
	<div class="data-table ads-left">
		<div class="main-title">
		<h2>广告列表</h2>
		</div>
		<table cellspacing="0" class="adsListShow table-striped" style="height:auto">
			<thead>
				<tr>
					<th>ID</th>
					<th>广告标题</th>
					<th>广告内容</th>
					<th>最新活动</th>
					<th>发布时间</th>
					<th>结束时间</th>
					<th>广告类型</th>
					<!--轮播还是顶部滚动-->
					<th>图片</th>
					<th>店铺介绍</th>
					<th>电话</th>
					<th>更多详情</td>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): if($v["is_delete"] == 0): ?><tr>
									<td><?php echo ($v["adnum"]); ?></td>
									<td><?php echo ($v["adtitle"]); ?></td>
									<td><?php echo ($v["adtext"]); ?></td>
									<td><?php echo ($v["activity"]); ?></td>
									<td><?php echo ($v["starttime"]); ?></td>
									<td><?php echo ($v["endtime"]); ?></td>
									<td>
										<?php if($v["adtype"] == 1): ?>娱乐
											<?php elseif($v["adtype"] == 2): ?>养生
											<?php elseif($v["adtype"] == 3): ?>交通
											<?php elseif($v["adtype"] == 4): ?>购物
											<?php elseif($v["adtype"] == 5): ?>健身
											<?php elseif($v["adtype"] == 6): ?>银行
											<?php elseif($v["adtype"] == 7): ?>餐饮<?php endif; ?>
									</td>
									<td>
										<a href="<?php echo ($v["adpic"]); ?>" class="swipebox">
											<img src='<?php echo ($v["adpic"]); ?>' width="70px" height="70px" style="cursor: pointer;"/>
										</a>
										</td>
									<td><?php echo ($v["introduction"]); ?></td>
									<td><?php echo ($v["phone"]); ?></td>
									<td class="checkMoreDetail">点我查看
										<div class="moreDetailShow" style="display: none;">
											<p>广告编号:<?php echo ($v["adnum"]); ?></p>
											<p>公司名称：<?php echo ($v["adname"]); ?></p>
											<p>播放位置：<?php if($v["vehicle"] == 0): ?>无
											<?php elseif($v["vehicle"] == 1): ?>顶部滚动<?php endif; ?></p>
											<p>店铺地址:<?php echo ($v["address"]); ?> </p>
											<p>广告备注:<?php echo ($v["adremark"]); ?></p>
										</div>
									</td>
								</tr><?php endif; endforeach; endif; ?>
			</tbody>
		</table>
		<table cellspacing="0" class="adsListShow  table-striped " style="height:auto">
			<thead>
				<tr>
					<th>ID(已过期)</th>
					<th>广告标题</th>
					<th>广告内容</th>
					<th>最新活动</th>
					<th>发布时间</th>
					<th>结束时间</th>
					<th>广告类型</th>
					<!--轮播还是顶部滚动-->
					<th>图片</th>
					<th>店铺介绍</th>
					<th>电话</th>
					<th>更多详情</td>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): if($v["is_delete"] == 1): ?><tr>
							<td><?php echo ($v["adnum"]); ?></td>
							<td><?php echo ($v["adtitle"]); ?></td>
							<td><?php echo ($v["adtext"]); ?></td>
							<td><?php echo ($v["activity"]); ?></td>
							<td><?php echo ($v["starttime"]); ?></td>
							<td><?php echo ($v["endtime"]); ?></td>
							<td>
								<?php if($v["adtype"] == 1): ?>娱乐
									<?php elseif($v["adtype"] == 2): ?>养生
									<?php elseif($v["adtype"] == 3): ?>交通
									<?php elseif($v["adtype"] == 4): ?>购物
									<?php elseif($v["adtype"] == 5): ?>健身
									<?php elseif($v["adtype"] == 6): ?>银行
									<?php elseif($v["adtype"] == 7): ?>餐饮<?php endif; ?>
							</td>
							
							<td>
								<a href="<?php echo ($v["adpic"]); ?>" class="swipebox">
									<img src='<?php echo ($v["adpic"]); ?>' width="70px" height="70px" style="cursor: pointer;"/>
								</a>
							</td>
							<td><?php echo ($v["introduction"]); ?></td>
							<td><?php echo ($v["phone"]); ?></td>
							<td class="checkMoreDetail" >点我查看
								<div id="moreDetailShow" class="moreDetailShow">
									<p>广告编号:<?php echo ($v["adnum"]); ?></p>
									<p>公司名称：<?php echo ($v["adname"]); ?></p>
									<p>播放位置：<?php if($v["vehicle"] == 0): ?>无
									<?php elseif($v["vehicle"] == 1): ?>顶部滚动<?php endif; ?></p>
									<p>店铺地址:<?php echo ($v["address"]); ?> </p>
									<p>广告备注:<?php echo ($v["adremark"]); ?></p>
								</div>
							</td>
						</tr><?php endif; endforeach; endif; ?>
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