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
     * 影片排期列表
     */
    public function show(){
        $where = [];
        $request=Request::instance()->param();
        if(empty($request['id']) && !Session::get('id')){
            $this->error("参数错误","movies/show");
        }else{
            $where['mid'] = empty($request['id']) ? Session::get('id') : $request['id'];
            if(Session::get('id')){
                Session::set('id', Session::get('id'));
            }else{
                Session::set('id', $request['id']);
            }
        }
        $data = model('Schedules')->showList($where);
        $this->assign('id', $where['mid']);
        $this->assign('data',$data);
        return view('show');
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
        $request=Request::instance()->post();
        if(empty($request['mid'])){
            $this->error("参数错误",'schedules/show?id='.$where['a.mid']);
        }else{
            $where['a.mid'] = $request['mid'];
            $condition['mid'] = $request['mid'];
        }
        if(empty($request['date'])){
            $this->error("排期日期不能为空",'schedules/show?id='.$where['a.mid']);
        }else{
            $condition['date'] = date('Y-m-d', strtotime($request['date']));
        }
        if(empty($request['time'])){
            $this->error("排期时间不能为空",'schedules/show?id='.$where['a.mid']);
        }else{
            $condition['time'] = $request['time'];
        }
        if(empty($request['discount'])){
            $this->error("排期时间不能为空",'schedules/show?id='.$where['a.mid']);
        }else{
            $condition['discount'] = $request['discount'];
        }
        $condition['allNum'] = 50;
        $condition['available'] = 50;
        $data = model('Schedules')->add($condition);
        if(empty($data)) {
            $this->error('新增排期失败','schedules/add');
        }else{
            $this->success('新增排期成功','schedules/show?id='.$where['a.mid']);
        }
    }

    /*
     * 编辑影片排期
     */
    public function edit(){
        $where = [];
        $request=Request::instance()->get();
        if(empty($request['mid'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.id'] = $request['mid'];
        }
        $data = model('Movies')->show($where);
        $dataList = model('Schedules')->show($where);
        $this->assign('data',$data);
        $this->assign('dataList',$dataList);
        return view('edit');
    }

    public function editSchedules(){
        $where = [];
        $condition = [];
        $whereId = [];
        $request=Request::instance()->post();
        if(empty($request['mid'])){
            $this->error("参数错误",'schedules/show?id='.$request['mid']);
        }else{
            $where['a.mid'] = $request['mid'];
            $condition['mid'] = $request['mid'];
        }
        if(empty($request['id'])){
            $this->error("参数错误",'schedules/show?id='.$request['mid']);
        }else{
            $whereId['id'] = $request['id'];
        }
        if(empty($request['date'])){
            $this->error("排期日期不能为空",'schedules/show?id='.$request['mid']);
        }else{
            $condition['date'] = date('Y-m-d', strtotime($request['date']));
        }
        if(empty($request['time'])){
            $this->error("排期时间不能为空",'schedules/show?id='.$request['mid']);
        }else{
            $condition['time'] = $request['time'];
        }
        if(empty($request['discount'])){
            $this->error("排期时间不能为空",'schedules/show?id='.$request['mid']);
        }else{
            $condition['discount'] = $request['discount'];
        }
        $data = model('Schedules')->edit($condition, $whereId);
        if(empty($data)) {
            $this->error('编辑排期失败','schedules/add');
        }else{
            $this->success('编辑排期成功','schedules/show');
        }
    }

    /*
     * 删除影片排期
     */
    public function delete() {
        $where = [];
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['id'] = $request['id'];
        }
        $data = model('Schedules')->delete($where);
        if(empty($data)){
            $this->error('删除影片排期失败','Schedules/show');
        }else{
            $this->success('删除影片排期成功','Schedules/show');
        }
    }
}
?>