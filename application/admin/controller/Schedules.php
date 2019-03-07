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
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['mid'] = $request['id'];
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
        var_dump($request);
        if(empty($request['mid'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.mid'] = $request['mid'];
            $condition['mid'] = $request['mid'];
        }
        if(empty($request['date'])){
            $this->error("排期日期不能为空","movies/show");
        }else{
            $condition['date'] = date('Y-m-d', strtotime($request['date']));
        }
        if(empty($request['time'])){
            $this->error("排期时间不能为空","movies/show");
        }else{
            $condition['time'] = $request['time'];
        }
        if(empty($request['discount'])){
            $this->error("排期时间不能为空","movies/show");
        }else{
            $condition['discount'] = $request['discount'];
        }
        $condition['allNum'] = 50;
        $condition['available'] = 50;
        $data = model('Schedules')->add($condition);
        if(empty($data)) {
            $this->error('新增排期失败','schedules/add');
        }else{
            $this->success('新增排期成功','movies/show');
        }
    }

    /*
     * 编辑影片排期
     */
    public function edit(){
        $where = [];
        $condition = [];
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.id'] = $request['id'];
            $condition['id'] = $request['id'];
        }
        $data = model('Movies')->show($where);
        $dataList = model('Schedules')->show($condition);
        $this->assign('data',$data);
        $this->assign('dataList',$dataList);
        return view('edit');
    }

    public function editSchedules(){
        $where = [];
        $condition = [];
        $whereId = [];
        $request=Request::instance()->post();
        var_dump($request);
        if(empty($request['id'])){
            $this->error("参数错误","movies/show");
        }else{
            $whereId['id'] = $request['id'];
        }
        if(empty($request['mid'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['a.mid'] = $request['mid'];
            $condition['mid'] = $request['mid'];
        }
        if(empty($request['date'])){
            $this->error("排期日期不能为空","movies/show");
        }else{
            $condition['date'] = date('Y-m-d', strtotime($request['date']));
        }
        if(empty($request['time'])){
            $this->error("排期时间不能为空","movies/show");
        }else{
            $condition['time'] = $request['time'];
        }
        if(empty($request['discount'])){
            $this->error("排期时间不能为空","movies/show");
        }else{
            $condition['discount'] = $request['discount'];
        }
        $data = model('Schedules')->edit($condition, $whereId);
        if(empty($data)) {
            $this->error('编辑排期失败','schedules/add');
        }else{
            $this->success('编辑排期成功','movies/show');
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
            $this->error('删除影片排期失败','Schedules/index');
        }else{
            $this->success('删除影片排期成功','Schedules/index');
        }
    }
}
?>