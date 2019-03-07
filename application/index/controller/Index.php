<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Session;

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




}
?>