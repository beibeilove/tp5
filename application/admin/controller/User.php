<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\helper\hash\Md5;
use think\Request;
class User extends Controller
{
    public function add()
    {
        return view("add");
    }
    // 添加用户
    public function addUser(){
        $condition = array();
        $request = Request::instance();
        $username = $request->post("username");
        $password = $request->post("password");
        if(empty($username)){
            $this->error("请输入用户名",'User/add');
        }else{
            $condition['username'] = $username;
        }
        if(empty($password)){
            $this->error("请输入用户名",'User/add');
        }else{
            $condition['password'] = Md5($password);
        }
//        $terminal = 1;
        $user = $this->userRepeat($condition['username'], $terminal);
        if(!$user){
            $this->error("用户已存在",'User/add');
        }else {
            $data = model("User")->add($condition);
            if ($data) {
                $this->success("新增用户成功", 'User/add');
            }else{
                $this->error("新增用户失败",'User/add');
            }
        }
    }
    // 查看用户名是否重复
    public function userRepeat($username, $terminal)
    {
        $condition['username'] = $username;
        $condition['terminal'] = $terminal;
        $data = model("User")->show($condition);
        if($data){
            return false;
        }else{
            return true;
        }
    }

    //列表
    public function show()
    {
        $data=model("User")->showList();
        $this->assign("data",$data);
        return view("show");
    }
    //详情
    public function selectUser()
    {
        $where = [];
        $request = Request::instance();
        $id=$request->get("id");
        $username='';
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
        return view("edit");
    }
    // 修改
    public function editUser()
    {
        $where = [];
        $condition = [];
        $request = Request::instance();
        $pass = [];
        $username = $request->post("username");
        $id = $request->post("id");
        $oldPassword = $request->post("oldpassword");
        $Password = $request->post("password");
        $newPassword = $request->post("newpassword");
        if(empty($id)){
            $this->error("参数有误","User/selectUser");
        }else{
            $where['id'] = $id;
        }
        if(empty($username)){
            $this->error("用户名为空","User/selectUser");
        }
        if(empty($oldPassword)){
            $this->error("旧密码为空","User/selectUser");
        }else{
            $pass = model("User")->show($where, "password");
        }
        if(empty($Password)){
            $this->error("新密码为空","User/selectUser","id=".$id);
        }
        if($newPassword!==$Password){
            $this->error("两次密码不一样","User/selectUser");
        }else{
            if($pass===md5($newPassword)){
                $this->error("密码与原密码一致");
            }else{
                $condition['password'] = md5($newPassword);
                $data = model("User")->edit($where, $condition);
                if($data){
                    $this->success("密码修改成功","User/show");
                }else{
                    $this->error("密码修改失败","User/selectUser");
                }
            }
        }
    }

    // 删除
    public function delete()
    {
        $request = Request::instance();
        $id=$request->get("id");
        if(empty($id)){
            $this->error("参数错误","User/show");
        }
        $data = model("User")->delete($id);
        if(empty($data)){
            $this->error("删除失败","User/show");
        }else{
            $this->success("删除成功","User/show");
        }
    }
}