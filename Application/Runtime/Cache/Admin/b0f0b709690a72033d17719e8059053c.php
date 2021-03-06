<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--360浏览器优先以webkit内核解析-->
        <title>欢迎登录</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
        <style>
            .header_pic {
                width: 100px;
                height:100px;
                margin: 25px 20px 20px 40px;
                float: left;
            }
            
            #header_p {
                border-radius: 100%;
            }

            .header_top {
                float: left;
                margin: 20px 20px 20px 20px;
            }

            .header_right {
                float: left;
                color: #1D68B7;
                margin: 20px 20px 20px 20px;
            }

            #time {
                font-size: 45px;
                line-height: 70px;
            }

            .main {
                width: 1050px;
                margin-left: 15px;
            }

        </style>
        <base target="_blank">
    </head>

    <body class="gray-bg">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-sm-12">
                <blockquote class="text-warning" style="font-size:14px;height: 183px">
                    <div class="header_pic">
                        <img src="<?php echo ($header_pic); ?>" id="header_p" width="100px" height="100px" />
                    </div>
                    <div class="header_top">
                        <table>
                            <tr>
                                <td><h2><?php echo ($username); ?> 欢迎回来</h2></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>所属用户组: 
                                        <?php if(($extent) == "1"): ?>超级管理员<?php endif; ?>
                                        <?php if(($extent) == "2"): ?>管理员<?php endif; ?>
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <td><h4>最后登录时间: <?php echo (date("Y-m-d H:i:s",$lasttime)); ?></h4></td>
                            </tr>
                            <tr>
                                <td><h4>当前登录IP地址: <?php echo ($addr); ?> , 这是您第 <?php echo ($loginnum); ?> 次登录 </h4></td>
                            </tr>
                        </table>
                    </div>
                    <div class="header_right">
                        <table>
                            <tr>
                                <td><h1>当前服务器时间</h1></td>
                            </tr>
                            <tr>
                                <td><i><h2 id="time"></h2></i></td>
                            </tr>
                        </table>
                    </div>
                </blockquote>
            </div>
            <div class="main">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>系统信息</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2" width="50%">网站信息</th>
                                    <!-- <th></th> -->
                                    <th colspan="2" width="50%">服务器信息</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>会员注册</td>
                                    <?php if(($regsw) == "1"): ?><td>开启</td><?php endif; ?>
                                    <?php if(($regsw) == "2"): ?><td>关闭</td><?php endif; ?>
                                    <td>服务器软件</td>
                                    <td><?php echo ($server); ?></td>
                                </tr>
                                <tr>
                                    <td>管理员个数</td>
                                    <td><?php echo ($adminCount); ?> 个</td>
                                    <td>操作系统</td>
                                    <td><?php echo ($system); ?></td>
                                </tr>
                                <tr>
                                    <td>过期广告数</td>
                                    <td><?php echo ($duead); ?> 个</td>
                                    <td>PHP版本</td>
                                    <td><?php echo ($version); ?></td>
                                </tr>
                                <tr>
                                    <td>程序编码</td>
                                    <td>UTF-8</td>
                                    <td>MYSQL版本</td>
                                    <td><?php echo ($myver); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>开发团队</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="15%">版权信息</td>
                                    <td>CopyRight &copy; 2017.致一科技 All rights reserved.</td>
                                </tr>
                                <tr>
                                    <td>开发与支持团队</td>
                                    <td>Power By 张世龙、杨&nbsp; 森 、庄垄维、尚&nbsp; 宇</td>
                                </tr>
                                <tr>
                                    <td>特别鸣谢</td>
                                    <td>徐思航、姚新宇、徐培伟、王&nbsp; 玉、都恒辰</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </script>
        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <script src="/watch_shop/Public/admin/js/plugins/layer/layer.min.js"></script>
        <script src="/watch_shop/Public/admin/js/content.min.js"></script>
        <script src="/watch_shop/Public/admin/js/welcome.min.js"></script>
        <script type="text/javascript">
            var date = null, myYear = null, myMonth = null, myDate = null, myHour = null,
            myMinute = null, mySecond = null;
            
            var timer = $("#time");

            var time = setInterval(function(){
                date = new Date();
                myYear = date.getFullYear();
                myMonth = date.getMonth() + 1;
                myDate = date.getDate();
                myHour = date.getHours();
                myMinute = date.getMinutes();
                mySecond = date.getSeconds();
                
                if(myMonth < 10){
                    myMonth = "0"+myMonth;
                }

                if(myDate < 10){
                    myDate = "0"+myDate;
                }

                if(myHour < 10){
                    myHour = "0"+myHour;
                }

                if(myMinute < 10){
                    myMinute = "0"+myMinute;
                }

                if(mySecond < 10){
                    mySecond = "0"+mySecond;
                }

                timer.html(myYear+"/"+myMonth+"/"+myDate+"&nbsp;"+myHour+":"+myMinute+":"+mySecond);
            },1000);
        </script>
    </body>
</html>