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
        $condition = 'a.releaseTime between DATE_SUB(NOW(),INTERVAL 30 day) and now()';
        $now = model('movies')->showList($condition, '*');
        $this->assign('now', $now);
        /*
         * 即将上映
         */
        $condition = 'a.releaseTime > NOW()';
        $future = model('movies')->showList($condition, '*');
        $this->assign('future', $future);
        /*
         * 已下架
         */
        $condition = 'UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(a.releaseTime) >= 30*24*3600';
        $passed = model('movies')->showList($condition, '*');
        $this->assign('passed', $passed);
        return view('index');
    }




}
?>