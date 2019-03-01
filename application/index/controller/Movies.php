<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Movies extends Controller
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
        $condition = 'a.releaseTime > NOW()';
        $data = model('movies')->showList($condition, '*');
        $this->assign('data', $data);
        return view('index');
    }
}

?>