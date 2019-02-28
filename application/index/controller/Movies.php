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
    public function index() {
        $condition['type'] = 3;
        $data = model('movies')->showList($condition);
        $this->assign('data', $data);
        return view('index');
    }
}

?>