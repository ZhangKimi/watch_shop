<?php
	namespace Home\Controller;
	use Think\Controller;
	class CartController extends Controller {
	    public function index() {
	    	$db = M("cart");
	    	$uid = $_SESSION['user']['uid'];
	    	$info = $db -> join("brand ON brand.id = cart.bid")
	    				-> where("`uid` = '{$uid}'")
	    	            -> select();
	    	// 显示用户购物车购物数量
	    	$num = shopCartNum($_SESSION['user']['uid']);
	    	$this -> assign("shopNum", $num);
	    	$this -> assign("number",$num);
	    	// 显示导航
          	$this -> assign("list", displayFirst());
          	$this -> assign("result", displaySecond());
          	for($j = 0; $j < count($info);$j++) {
                $info[$j]['id'] = $j + 1;
          	}
          	 $mod = M("products_details");
            // 用商品pid 品牌bid 将商品详情表与商品表和品牌表连接
            $info1 = $mod -> join('product ON products_details.pid = product.pid')
                        -> join('brand ON products_details.brandid = brand.id')
                        // 查询前8条数据
                        -> limit(0,5)
                        // 执行查询
                        -> select();
            // 将商品信息发送至前台
            $this -> assign('info1',$info1);
          	$this -> assign("info", $info);
          	$this -> display("index");
	    }
        
	    public function addOne() {
	        
	        $db = M("cart");
	        $value = $db -> where("pid={$_POST['pid']}") -> select(); 
	        if($value){
	            $num=$value[0]['num']+1;
	            $map['cid'] = $value[0]['cid'];
	            $map['num'] = $num;
	            $val = $db -> save($map);
	            if($val){
	                die('1');
	            }else{
	                die('0');
	            }
	        }else{
	        $pid = $_POST['pid'];
	        
	        $data['uid'] = $_SESSION['user']['uid'];
	        $data['pid'] = $_POST['pid'];
	        $data['num'] = 1;
	        $data['pic'] = $_POST['pic'];
	        $data['price'] = $_POST['price'];
	        $data['name'] = $_POST['name'];
	        $data['bid'] = $_POST['bid'];
	        
	        $result = $db -> add($data);
    	        if($result) {
    	        	$res = reduceStock($data['pid'], 1);
    	        	if($res) {
    	        		die('1');
    	        	}else {
    	        		die('0');
    	        	}
    	        }else {
    	        	die('0');
    	           }
	        }
	    }
	    public function addDuo(){
	        
	        $db = M("cart");
	        $value = $db -> where("pid={$_POST['pid']}") -> select();
	        if($value){
	            $num=$value[0]['num']+$_POST['num'];
	            $map['cid'] = $value[0]['cid'];
	            $map['num'] = $num;
	            $val = $db -> save($map);
	            if($val){
	                die('1');
	            }else{
	                die('0');
	            }
	        }else{

	        $data['uid'] = $_SESSION['user']['uid'];
	        $data['pid'] = $_POST['pid'];
	        /* $data['pid'] = $_POST['pid']; */
	        $data['num'] = $_POST['num'];
	        $data['pic'] = $_POST['pic'];
	        $data['price'] = $_POST['price'];
	        $data['name'] = $_POST['name'];
	        $data['bid'] = $_POST['bid'];
	  
	       
	        $result = $db -> add($data);
	  
            if($result) {
                die('1'); 
            }else {
                die('0');
            }
	        }
	    }
	    public function cartDel() {
	    	$cid = $_GET['id'];
	    	$db = M('cart');
	    	$res=$db -> where("`cid`='{$cid}'") ->delete();
	    	if($res){
	    	    $this->success('ok','index','0');
	    	}else{
	    	    $this->error('no','index');
	    	}
	    	
	    	
	    }
	    
	    public function add_num(){
	        //var_dump($_POST);die;
	        $m = M("cart");
	        
	        $stock = $m->table("product")->where("pid={$_POST['pid']}")->find()['stock'];
	        if($_POST['num'] > $stock){
	            echo "2";die;
	        }
	        
	        if($_POST['num'] < 1){
	            echo "3";die;
	        }
	        //即使更新购物车数量setField
	        if($m->where("cid={$_POST['order_id']}")->setField("num",$_POST['num'])){
	            echo "1";die;
	        }else{
	            echo "0";die;
	        }
	    }
	}