<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class Position extends Controller
{
    public function add()
    {
        return view("index");
    }
    // 添加类别
    public function addPosition()
    {
        $request = Request::instance();
        $posname=$request->post("posname");
        if(empty($posname)){
            $this->error("类别不能为空","Position/add");
        }else{
            $condition['posname'] = $posname;
            $data = model("Position")->add($condition);
            if($data){
                $this->success("类别添加成功","Position/show");
            }else{
                $this->error("类别添加失败","Position/show");
            }
        }
    }
    // 展示列表
    public function show()
    {
        $where = '';
        $searcharr = [];
        $request = Request::instance();
        $posname = $request->post("posname");
        if(!empty($posname)){
            $where.= "posname like '%$posname%'";
            $searcharr['posname'] = $posname;
        }else{
            $searcharr['posname'] = "";
        }
        $data = model("Position")->showList1($where);
        $this->assign("searcharr",$searcharr);
        $this->assign("data",$data);
        return view("show");
    }

    // 类别详情
    public function showPosition()
    {
        $request = Request::instance();
        $posid = $request->get("posid");
        if(empty($posid)){
            $this->error("参数错误","Position/show");
        }else{
            $where['posid'] =$posid;
            $data = model("Position")->show($where);
            if(empty($data)){
                $this->error("参数错误","Position/show");
            }else{
                $this->assign("data",$data);
                return view("edit");
            }
        }
    }

    // 类别修改
    public function editPosition()
    {
        $where = [];
        $condition = [];
        $request = Request::instance();
        $posid = $request->post("posid");
        $posname = $request->post("posname");
        if(empty($posid)){
            $this->error("参数错误","Position/show");
        }else{
            $where['posid'] = $posid;
        }
        if(empty($posname)){
            $this->error("类别不能为空","Position/show");
        }else{
            $condition['posname'] = $posname;
        }
        $data = model("Position")->show($condition);
        if(!empty($data)){
            $this->error("该类别已存在","Position/show");
        }else{
            $datas = model("Position")->edit($condition, $where);
            if(!empty($datas)){
                $this->success("修改成功","Position/show");
            }else{
                $this->error("修改失败","Position/show");
            }
        }
    }

    // 类别删除
    public function delete()
    {
        $where = [];
        $request = Request::instance();
        $posid = $request->get("posid");
        if(empty($posid)){
            $this->error("参数错误","Position/show");
        }else{
            $where['posid'] = $posid;
        }
        $data = model("Position")->delete($where);
        if(!empty($data)){
            $this->success("删除成功","Position/show");
        }else{
            $this->error("删除失败","Position/show");
        }
    }
}
?>