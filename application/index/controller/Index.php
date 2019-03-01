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


    /*
     * 影片列表页
     */
    public function index() {
        /*
         * 正在热映
         */
        $condition = 'a.releaseTime < NOW()';
        $now = model('movies')->showList($condition, '*');
        $this->assign('now', $now);
        /*
         * 即将上映
         */
        $condition = 'a.releaseTime > NOW()';
        $future = model('movies')->showList($condition, '*');
        $this->assign('future', $future);
        return view('index');
    }

    public function index1(){
        if (!@include(dirname(dirname(__FILE__)) . '/menu.php')) exit('menu.php isn\'t exists!');
        $user_id=session('frontUserId');
        $username=session("userName");
        if(!$user_id){
            $this->redirect("login/index");
        }else{
//            $this->assign("menulist",$menulist);
            $this->assign("username",$username);
        }
        return view("index");
    }

}
?>