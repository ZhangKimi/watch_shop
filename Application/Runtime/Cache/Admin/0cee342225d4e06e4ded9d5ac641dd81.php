<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>会员设置</title>
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
                            <h5>会员设置</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal" >
                                <input type="hidden" name="id" value="<?php echo ($id); ?>" />
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">会员注册</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" <?php if(($regsw) == "1"): ?>checked<?php endif; ?> name="regsw"> <i></i> 开启用户注册</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($regsw) == "2"): ?>checked<?php endif; ?> name="regsw"> <i></i> 关闭用户注册</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">会员注册审核方式</label>
                                    <div class="col-sm-10">
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="1" <?php if(($isactive) == "1"): ?>checked<?php endif; ?> name="isactive"> <i></i> 无</label>
                                        </div>
                                        <div class="radio i-checks">
                                            <label>
                                                <input type="radio" value="2" <?php if(($isactive) == "2"): ?>checked<?php endif; ?> name="isactive"> <i></i> 邮箱激活</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">注册赠送积分数</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="giveintegral" value="<?php echo ($giveintegral); ?>" required>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">激活链接有效期</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="token_exptime" value="<?php echo ($token_exptime); ?>">
                                        <span class="help-block m-b-none">单位: 小时</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">激活邮件内容</label>
                                        <div class="col-sm-10">
                                            <textarea name="emailcontent" rows="5" cols="30" class="form-control"><?php echo ($emailcontent); ?></textarea>
                                        </div>
                                    </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" id="save">保存内容</button>
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
            $(document).ready(function(){
                $(".i-checks").iCheck({
                    checkboxClass:"icheckbox_square-green",
                    radioClass:"iradio_square-green",
                })
            });

            $("#save").click(function(){
                swal({
                    title: "是否要保存网站的基础信息 ?",
                    text: "保存后刷新网站前台后会更新设置",
                    type: "info",
                    confirmButtonText: "保存",
                    cancelButtonText: "取消",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                },
                function(){
                    $.ajax({
                        url: '/watch_shop/index.php/Admin/Memberconfig/configSave',
                        type: 'POST',
                        dataType: 'text',
                        data: {
                            id: $("input[name = id]").val(),
                            regsw: $("input[name = regsw]:checked").val(),
                            isactive: $("input[name = isactive]:checked").val(),
                            giveintegral: $("input[name = giveintegral]").val(),
                            token_exptime: $("input[name = token_exptime]").val(),
                            emailcontent: $("textarea[name = emailcontent]").val()
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
                                        location.href = "/watch_shop/index.php/Admin/Memberconfig";
                                    });
                                    break;
                                case "0":
                                    swal("保存失败", "网络连接失败或属性无改变", "error");
                                    break;
                            }
                        },
                        error: function() {
                            swal("保存失败", "网络不给力 , 请检查网络设置","error");
                        }
                    });
                });
            });
        </script>
    </body>
</html>