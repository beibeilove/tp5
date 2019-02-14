<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    public function index(){
        if (!@include(dirname(dirname(__FILE__)) . '/menu.php')) exit('menu.php isn\'t exists!');
        $user_id=session('userId');
        $username=session("userName");
        if(!$user_id){
            $this->redirect("login/index");
        }else{
            $this->assign("menulist",$menulist);
            $this->assign("username",$username);
        }
        return view("index");
    }

}
?>