<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luxury Watches - 用户编辑</title>
        <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico">
        <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
        <link href="/watch_shop/Public/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <script src="/watch_shop/Public/admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    </head>

    <body class="gray-bg">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>编辑 <?php echo ($username); ?>&nbsp;&nbsp;&nbsp;<a href="/watch_shop/index.php/Admin/Adminedit">返回</a></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal" >
                                    <input type="hidden" name="aid" value="<?php echo ($id); ?>" />
                                    <input type="hidden" name="username" value="<?php echo ($username); ?>" />
                                    <div class="form-group" id="ipgroup">
                                        <label class="col-sm-2 control-label">限制登录IP地址
                                            <br /><small class="text-navy">不填写则不限制IP地址</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="allowaddr" id="addr" class="form-control" value="<?php echo ($addr); ?>">
                                            <span class="help-block m-b-none" id="ipmess">如需对管理员登录IP地址限制，请在此填写IP地址</span>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">用户权限</label>
                                    <?php if(($extent) == "1"): ?><div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="1" checked name="extent"> <i></i> 超级管理员</label>
                                            </div>
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="2" name="extent"> <i></i> 管理员</label>
                                            </div>
                                        </div><?php endif; ?>

                                    <?php if(($extent) == "2"): ?><div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="1" name="extent"> <i></i> 超级管理员</label>
                                            </div>
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="2" checked name="extent"> <i></i> 管理员</label>
                                            </div>
                                        </div><?php endif; ?>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">用户状态</label>
                                    <?php if(($stat) == "1"): ?><div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="1" checked name="stat"> <i></i> 正常状态</label>
                                            </div>
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="0" name="stat"> <i></i> 禁用状态</label>
                                            </div>
                                        </div><?php endif; ?>

                                    <?php if(($stat) == "0"): ?><div class="col-sm-10">
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="1" name="stat"> <i></i> 正常状态</label>
                                            </div>
                                            <div class="radio i-checks">
                                                <label>
                                                    <input type="radio" value="0" checked name="stat"> <i></i> 禁用状态</label>
                                            </div>
                                        </div><?php endif; ?>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit" id="save" onclick="return check_form();">保存内容</button>
                                        <button class="btn btn-white" id="cancel">返回</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script>
        <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script>
        <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
        <script src="/watch_shop/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});

            // 正则表达式
                 
            // IP地址正则
            var p3 = /^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/

            // -------------------------------------------------------------
            
            // IP地址验证
            $("#addr").blur(function() {
                if($("#addr").val() == "") {
                    $("#ipgroup").removeClass('has-success');
                    $("#ipgroup").removeClass('has-error');
                    $("#ipmess").html("如需对管理员登录IP地址限制，请在此填写IP地址")
                }else {
                    if(!p3.test($("#addr").val())) {
                        $("#ipgroup").removeClass('has-success');
                        $("#ipgroup").addClass('has-error');
                        $("#ipmess").html("请填写正确的IP地址！");
                    }else {
                        $("#ipgroup").removeClass('has-error');
                        $("#ipgroup").addClass('has-success');
                        $("#ipmess").html("验证通过");
                    }
                }
            });
            

            // ------------------------------------------------------------- 
            // 提交判断
             
            function check_form() {
                if($("#addr").val()){
                   if(!p3.test($("#addr").val())) {
                        $("#ipgroup").removeClass('has-success');
                        $("#ipgroup").addClass('has-error');
                        $("#ipmess").html("请填写正确的IP地址！");
                        return false;
                    } 
                }
            }

            $("#cancel").click(function(){
                swal({
                    title: "是否要取消对用户<?php echo ($username); ?>的设置 ?",
                    text: "返回到管理员编辑列表",
                    type: "warning",
                    showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"是的，我要返回！",
                    cancelButtonText:"让我再考虑一下…",
                    closeOnConfirm:false,
                    closeOnCancel:false
                },function(isConfirm){
                    if(isConfirm) {
                        location.href = "/watch_shop/index.php/Admin/Adminedit";
                    }else {
                        swal("已取消","您取消了返回操作！","error");
                    }
                });
            });

            $("#save").click(function(){
                swal({
                    title: "是否要保存用户<?php echo ($username); ?>的设置信息 ?",
                    text: "保存设置并返回管理员编辑列表",
                    type: "info",
                    confirmButtonText: "保存",
                    cancelButtonText: "取消",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    $.ajax({
                    url: '/watch_shop/index.php/Admin/Adminedit/doedit',
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        aid: $("input[name = aid]").val(),
                        allowaddr: $("input[name = allowaddr]").val(),
                        extent: $("input[name = extent]:checked").val(),
                        stat: $("input[name = stat]:checked").val()
                    },
                    dataFilter: function(data){
                        return data;
                    },
                    success: function(data) {
                        switch(data) {
                            case "1":
                                swal({
                                    title: "保存成功",
                                    text: "系统已经保存您修改的内容",
                                    type: "success"
                                },function(){
                                    location.href = "/watch_shop/index.php/Admin/Adminedit";
                                });
                                break;
                            case "0":
                                swal("保存失败", "网络连接失败或管理员属性无改变", "error");
                                break;
                        }
                    },
                    error: function() {
                        swal("保存失败", "网络不给力 , 请检查网络设置","error");
                    }
                });
            });
                


                /**/
            });
        </script>
        <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
    </body>

</html>