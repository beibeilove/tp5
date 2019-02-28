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
    // 添加推荐位
    public function addPosition()
    {
        $request = Request::instance();
        $posname=$request->post("posname");
        if(empty($posname)){
            $this->error("推荐位不能为空","Position/add");
        }else{
            $condition['posname'] = $posname;
            $data = model("Position")->add($condition);
            if($data){
                $this->success("推荐位添加成功","Position/show");
            }else{
                $this->error("推荐位添加失败","Position/show");
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
        $data = model("Position")->showList($where);
        $this->assign("searcharr",$searcharr);
        $this->assign("data",$data);
        return view("show");
    }

    // 推荐位详情
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

    // 推荐位修改
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
            $this->error("推荐位不能为空","Position/show");
        }else{
            $condition['posname'] = $posname;
        }
        $data = model("Position")->show($condition);
        if(!empty($data)){
            $this->error("该推荐位已存在","Position/show");
        }else{
            $datas = model("Position")->edit($condition, $where);
            if(!empty($datas)){
                $this->success("修改成功","Position/show");
            }else{
                $this->error("修改失败","Position/show");
            }
        }
    }

    // 推荐位删除
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