<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
class Order extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /*
     * 选座订票
     */
    public function index(){
        $where = [];
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/index");
        }else{
            $where['id'] = $request['id'];
        }
    }
}
?>