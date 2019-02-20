<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        if (!@include(dirname(dirname(__FILE__)) . '/menu.php')) exit('menu.php isn\'t exists!');
        $user_id=session('adminUserId');
        $username=session("userName");
        if(!$user_id){
            $this->redirect("login/index");
        }else{
            $this->assign("menulist",$menulist);
            $this->assign("username",$username);
        }
        return view("layout");
    }
    public function welcome()
    {
        return view("welcome");
    }
}
