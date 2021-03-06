<?php if (!defined('THINK_PATH')) exit();?><html>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>顾客排队</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/Smartorder/Application/Queue/View/Public/css/2.css">
    <link rel="stylesheet" type="text/css" href="/Smartorder/Application/Queue/View/Public/css/bootstrap.min.css">
    <!--用来设定tab-->
    <link rel="stylesheet" type="text/css" href="/Smartorder/Application/Queue/View/Public/css/jq22.css">

</head>

<body>
    <div class="wholescreen" id="backPage">
        <div class="container">
            <!--等候桌位按钮-->
            <div class="bs">
                <div class="row">
                    <div class="col-sm-9">
                    </div>
                    <div class="col-sm-3">
                        <button class="mybtn " id="toOnQuene">等候桌位</button>
                    </div>
                </div>
            </div>
            <!--end-->

            <!--桌位情况 tab-->
            <div class="row" id="quenetabs">
                <!--<div class="col-md-1"></div>-->
                <div class="col-md-12">
                    <ul id="tabs">
                        <li><a href="#" title="tab1" id="2">1-2人<span class="circle" id="circle1"></span><span class="cir" id="cir1"></span></a></li>
                        <li><a href="#" title="tab2" id="4">3-4人<span class="circle" id="circle2"></span><span class="cir" id="cir2"></a></li>
                        <li><a href="#" title="tab3" id="6">5-6人<span class="circle" id="circle3"></span><span class="cir" id="cir3"></a></li>
                        <li><a href="#" title="tab4" id="8">7人上<span class="circle" id="circle4"></span><span class="cir" id="cir4"></a></li>
                        <li><a href="#" title="tab5" id="0">总情况<span class="circle" id="circle5"></span><span class="cir" id="cir5" ></span></a></li>
                    </ul>
                    <div id="custQueneTab">
                        <div id="tab1" class="tab">
                            <div id="tableDisplay1" class="tableDisplay"></div>
                            <!--<span class="tablePre right" />-->
                            <div class="queueDisplay">
                                <table cellspacing="0" id="tabTable1" class="tabTable" style="height:100%">
                                    <thead>
                                        <tr class="titleTable">
                                            <td class="num">序列号</td>
                                            <td class="phone" colspan="2">顾客</td>
                                            <td class="number">排号数</td>
                                            <td class="opera" colspan="3">操作</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab2" class="tab">
                            <!--<span class="tablePre" />-->
                            <div id="tableDisplay2" class="tableDisplay"></div>
                            <div class="queueDisplay">
                                <table cellspacing="0" id="tabTable2" class="tabTable" style="height:100%">
                                    <thead>
                                        <tr class="titleTable">
                                            <td class="num">序列号</td>
                                            <td class="phone" colspan="2">顾客</td>
                                            <td class="number">排号数</td>
                                            <td class="opera" colspan="3">操作</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab3" class="tab">
                            <!--<span class="tablePre" />-->
                            <div id="tableDisplay3" class="tableDisplay"></div>
                            <div class="queueDisplay">

                                <table cellspacing="0" id="tabTable3" class="tabTable" style="height:100%">
                                    <thead>
                                        <tr class="titleTable">
                                            <td class="num">序列号</td>
                                            <td class="phone" colspan="2">顾客</td>
                                            <td class="number">排号数</td>
                                            <td class="opera" colspan="3">操作</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab4" class="tab">
                            <!--<span class="tablePre" />-->
                            <div id="tableDisplay4" class="tableDisplay"></div>
                            <div class="queueDisplay">
                                <table cellspacing="0" id="tabTable4" class="tabTable" style="height:100%">
                                    <thead>
                                        <tr class="titleTable">
                                            <td class="num">序列号</td>
                                            <td class="phone" colspan="2">顾客</td>
                                            <td class="number">排号数</td>
                                            <td class="opera" colspan="3">操作</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div id="tab5" class="tab">
                            <!--<span class="tablePre" />-->
                            <div id="tableDisplay5" class="tableDisplay"></div>
                            <div class="queueDisplay">
                                <table cellspacing="0" id="tabTable5" class="tabTable" style="height:100%">
                                    <thead class="fixed-thead">
                                        <tr class="titleTable">
                                            <td class="num">序列号</td>
                                            <td class="phone" colspan="2">顾客</td>
                                            <td class="number">用餐人数</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end-->
                </div>
            </div>
            <!--弹窗-->
            <div class="popup" id="popupDiv">
                <div id="confirmUpTable">
                    <h2 id="upTableMessage"></h2>
                    <form>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-5">
                                <button type="button" class="btn btn-primary confirmbtn" id="confirmBtn">确认</button>
                            </div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-primary confirmbtn" id="cancelBtn">取消</button>
                            </div>
                        </div>
                    </form>
                </div>



                <div class="queneInfo" id="queneInfo" style="padding: 1em;">
                    <h2>排队</h2>
                    <form class="form-horizontal queneInfoForm" action="" method="post" id="queneForm">
                        <div class="form-group">
                            <label for="CustNum" class="col-sm-5 control-label formtitle">用餐人数</label>
                            <div class="col-sm-5">
                                <!--下拉框-->
                                <select class="form-control" id="custNum">
                            <option value="2">1-2人</option>
                            <option value="4">3-4人</option>
                            <option value="6">5-6人</option>
                            <option value="8">7人以上</option>
                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="custPhone" class="col-sm-5 control-label formtitle">手机号</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="custPhone" placeholder="请输入手机号" name='mobile'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-5">
                                <button type="button" class="btn btn-primary confirmbtn" id="confirmCustInfo">确认提交</button>
                            </div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-primary confirmbtn" id="cancelCustInfo">取消</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!--end-->


            <!-- Javascript -->
            <!-- JS -->
            <script src="/Smartorder/Application/Queue/View/Public/js/jquery-1.8.2.min.js"></script>

            <!--     <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script> -->
            <script>
                $(document).ready(function() {
                    $("#custQueneTab div").hide(); // Initially hide all content
                    $("#tabs li:first").attr("id", "current"); // Activate first tab
                    $("#custQueneTab div:first").fadeIn(); // Show first tab content

                    $('#tabs a').click(function(e) {
                        e.preventDefault();
                        $("#custQueneTab div").hide(); //Hide all content
                        $("#tabs li").attr("id", ""); //Reset id's
                        $(this).parent().attr("id", "current"); // Activate this
                        $('#' + $(this).attr('title')).fadeIn();
                    });
                });
            </script>
            <script src="/Smartorder/Application/Queue/View/Public/js/scripts.js"></script>
            <script src="/Smartorder/Application/Queue/View/Public/js/forcustqueue.js"></script>
            <!--按人数显示桌子-->
            <script src="/Smartorder/Application/Queue/View/Public/js/getTableDisplay.js"></script>
            <script src="/Smartorder/Application/Queue/View/Public/js/getGlobalEmptyTables.js"></script>
            <script src="/Smartorder/Application/Queue/View/Public/js/distributeEmptyTable.js"></script>
            <script src="/Smartorder/Application/Queue/View/Public/js/delQueue.js"></script>
            <script src="/Smartorder/Application/Queue/View/Public/js/getQueue.js"></script>
            <!--<script src="/Smartorder/Application/Queue/View/Public/js/getTotalNumber.js"></script>-->
            <script>
                getNewestTableCondition();
                getNewestQueneCondition();
            </script>

            <script>
            </script>
</body>

</html>

</html>