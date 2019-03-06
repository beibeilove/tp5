<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
class Schedules extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /*
     * 新增影片排期
     */
    public function add(){
        $where = [];
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.id'] = $request['id'];
        }
        $data = model('Movies')->show($where);
        $this->assign('data',$data);
        return view('add');
    }

    public function addSchedules(){
        $where = [];
        $condition = [];
        $request=Request::instance()->get();
        if(empty($request['mid'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.mid'] = $request['mid'];
            $condition['mid'] = $request['id'];
        }
        if(empty($request['mid'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.id'] = $request['id'];
        }
        $data = model('Movies')->show($where);
        $this->assign('data',$data);
        return view('add');
    }
}
?>