<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Luxury Watches - 商品修改</title>
   <!--  <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术"> -->

    <link rel="shortcut icon" href="/watch_shop/Public/admin/favicon.ico"> 
    <link href="/watch_shop/Public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/watch_shop/Public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>
    <script type="text/javascript" src="/watch_shop/Public/admin/js/jquery.min.js"></script>
<script type="text/javascript">

    $(function(){
        
        $('.form-control').css('margin','5px');
        $(".form-control").focus(function(e){
            $(this).css({border:'1px solid yellow'});
        }).blur(function(e){
            $(this).css("border","1px solid black");
            });
        // var p1 = /^0?(13|15|18)[0-9]{9}$/;
        //  $("#telephone").blur(function(){
        //     if($("#telephone").val().match(p1)){
        //         $("#message").html("验证通过");
        //         $("#message").css("color","#00F");
        //         $("#telephone").addClass("class","success");}
        //     });
        
        
    var phone = document.getElementById("telephone");
    var submit = document.getElementById('submit');
    var message = document.getElementById("message");
    var p1 = /^0?(13|15|18)[0-9]{9}$/;
    phone.onblur = function(){
        if(p1.test(phone.value)){
            message.innerHTML = " √ ";
            message.color = "#00F";
            phone.setAttribute("class","success");
        }else {
            message.innerHTML = " × ";
            message.color = "#F00";
            phone.setAttribute("class","error");
        }
    }
    /*
        $("#phone").blur(function(){
            if(p1.test($("#phone").val()){
                $("#message").html("验证通过");
                $("#message").css("color","#00F");
                $("#phone").addClass("class","success");
            }
            });
        });
  */
    
    
    submit.onclick = function(){
        if(!p1.test(phone.value)){
            return false;
        }
    }

   });
   
</script>

</head>

<body class="gray-bg">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改<?php echo ($username); ?>会员的订单</h5>
                        
                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" target="_self" action="/watch_shop/index.php/Admin/Updateorder/update?name=<?php echo ($info['name']); ?>" >

                            <input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">联系人:</label>

                                <div class="col-sm-10">
                                    <input type="text" style="width:400px" name="name" value="<?php echo ($info['name']); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机:</label>
                                <div class="col-sm-10">
                                    <input type="text" style="width:400px" name="phone" id="telephone" value="<?php echo ($info['phone']); ?>" class="form-control"> <span id="message"></span>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                          
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">新地址:</label>

                                <div class="col-sm-10">
                                    <input type="text" style="width:400px" name="addr" placeholder="" value="<?php echo ($info['addr']); ?>" class="form-control">
                                </div>
                            </div>
                  
                            <div class="form-group">
                                <label class="col-sm-2 control-label">订单状态:</label>

                                <div class="col-sm-10">
                                    <select class="" name="state">
                                        <option value="0">新订单</option>
                                        <option value="1">已发货</option>
                                        <option value="2">已完成</option>
                                        <option value="3">无效订单</option>
                                    </select>

                                  
                                </div>
                            </div>
                            
                            <div class="">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" value="保存内容">
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 b-r">
                            <h3 class="m-t-none m-b">登录</h3>

                            <p>欢迎登录本站(⊙o⊙)</p>

                            <form role="form">
                                <div class="form-group">
                                    <label>用户名：</label>
                                    <input type="email" placeholder="请输入用户名" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>密码：</label>
                                    <input type="password" placeholder="请输入密码" class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>登录</strong>
                                    </button>
                                    <label>
                                        <input type="checkbox" class="i-checks">自动登录</label>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <h4>还不是会员？</h4>
                            <p>您可以注册一个账户</p>
                            <p class="text-center">
                                <a href="form_basic.html"><i class="fa fa-sign-in big-icon"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
     <script src="/watch_shop/Public/admin/js/jquery.min.js?v=2.1.4"></script> 
    <script src="/watch_shop/Public/admin/js/bootstrap.min.js?v=3.3.5"></script> 
    <script src="/watch_shop/Public/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/watch_shop/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>