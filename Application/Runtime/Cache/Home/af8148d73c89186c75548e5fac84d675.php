<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- <title>H+ 后台主题UI框架 - 空白页</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术"> -->

    <link rel="shortcut icon" href="favicon.ico"> <link href="/watch_shop/Public/css/bootstrap.mink.css?v=3.3.5" rel="stylesheet">
    <link href="/watch_shop/Public/css/font-awesome.mink.css?v=4.4.0" rel="stylesheet">

    <link href="/watch_shop/Public/css/animate.mink.css" rel="stylesheet">
    <link href="/watch_shop/Public/css/style.mink.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">



    <!-- <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>标题</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">主页</a>
                </li>
                <li>
                    <strong>包屑导航</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="empty_page.html" class="btn btn-primary">活动区域</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="middle-box text-center animated fadeInRightBig">
                    <h3 class="font-bold">这里是页面内容</h3>

                    <div class="error-desc">
                        您可以在这里添加栅格，参考首页及其他页面完成不同的布局
                        <br/><a href="#" class="btn btn-primary m-t">打开主页</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="latestproducts">
                    <div class="product-one">
                    <?php if(is_array($info)): foreach($info as $key=>$value): ?><div class="col-md-4 product-left p-left"> 
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/watch_shop/index.php/Home/Details/index?id=<?php echo ($value['id']); ?>" class="mask"><img class="img-responsive zoom-img" src="/watch_shop/Public/Uploads/<?php echo ($value['picurl']); ?>" alt=""  width="100px" /></a>
                                <div class="product-bottom">
                                    <h3><?php echo ($value['title']); ?></h3>
                                    <p> 库存量: <?php echo ($value['stock']); ?></p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ <?php echo ($value['price']); ?></span></h4>
                                </div>
                                <div class="srch">
                                   <!--  <span>-50%</span> -->
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
    <script src="/watch_shop/Public/js/jquery.mink.js?v=2.1.4"></script>
    <script src="/watch_shop/Public/js/bootstrap.mink.js?v=3.3.5"></script>
    <script src="/watch_shop/Public/js/content.mink.js?v=1.0.0"></script>
    <!-- <script type="/watch_shop/Public/text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>

</html>