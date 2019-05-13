<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use think\helper\hash\Md5;
use think\Request;
use think\Session;
class User extends Controller
{
    //详情
    public function index()
    {
        $where = [];
        $id = Session::get('frontId');
        $username=Session::get('frontUsername');
        if(empty($id)){
//            $this->error("参数错误","User/show");
        }else{
            $where['id']=$id;
        }
        $data = model("User")->show($where);
        if($data){
            $username = $data['username'];
            $id = $data['id'];
        }
        $this->assign("username",$username);
        $this->assign("id",$id);
        return view("index");
    }
    // 修改
    public function editUser()
    {
        $where = [];
        $condition = [];
        $request = Request::instance();
        $pass = [];
        $id = $request->post("id");
        $oldPassword = $request->post("oldpassword");
        $Password = $request->post("password");
        $newPassword = $request->post("newpassword");
        if(empty($id)){
            $this->error("参数有误","User/index");
        }else{
            $where['id'] = $id;
        }
        if(empty($oldPassword)){
            $this->error("旧密码为空","User/index");
        }else{
            $pass = model("User")->show($where, "password");
        }
        if(empty($Password)){
            $this->error("新密码为空","User/index");
        }
        if($newPassword!==$Password){
            $this->error("两次密码不一样","User/index");
        }else{
            if($pass===md5($newPassword)){
                $this->error("密码与原密码一致");
            }else{
                $condition['password'] = md5($newPassword);
                $condition['username'] = Session::get('username');
                $data = model("User")->edit($where, $condition);
                if($data){
                    Session::set("frontUserId","1");
                    Session::set('frontId',$data['id']);
                    $this->success("密码修改成功","Index/index");
                }else{
                    $this->error("密码修改失败","User/index");
                }
            }
        }
    }
}