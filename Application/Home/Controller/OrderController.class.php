<?php
    namespace Home\Controller;
    use Think\Controller;
    class OrderController extends Controller {
        public function index(){
            if(!$_SESSION['user']){
               redirect(__MODULE__.'/Login/dologin'); 
                /* $this->error('新增成功', __MODULE__.'/Login/dologin',3); */
                
            }
        	$uid = $_SESSION['user']['uid'];
    		$mod = M('cart');
    		$cid = $_GET['cid'];
    		$info = $mod  -> join("brand ON brand.id = cart.bid") -> where("`uid` = '$uid'") -> select();
//             die(dump($info));
    		$this ->assign('info',$info);
    		// 显示用户购物车购物数量
    		$this -> assign("shopNum", shopCartNum($_SESSION['user']['uid']));
    		// 显示导航栏
        	$this -> assign("list", displayFirst());
            $this -> assign("result", displaySecond());
            //取地址
            $db = M('revaddr');
            $add = $db -> where("`uid` = '$uid'") -> select();
            $this -> assign('add',$add);
            $this -> display("index");
        }
    }