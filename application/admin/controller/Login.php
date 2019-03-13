<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\helper\hash\Md5;
use \think\Request;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        return view("login");
    }

    // 验证登录
    public function relogin(){
        $request = Request::instance();
        $username=$request->post("username");
        $password=$request->post("password");
        $condition=array();
        if(!empty($username)){
            $condition['username'] = $username;
        }else{
            return $this->error('请填写用户名', url('Login/index'));
        }
        if(!empty($password)){
            $condition['password'] = Md5($password);
        }else{
            return $this->error('请填写密码', url('Login/index'));
        }
        $condition['terminal'] = 1;
        $data = model('User')->show($condition);
        if(empty($data)){
            return $this->error('用户名或密码不正确', url('Login/index'));
        }else{
            session::set("adminUserId","1");
            session::set('userName',$condition['username']);
            return $this->success('登录成功', url('index/index'));
        }
    }

    //退出登录
    public function logout()
    {
        session::delete("adminUserId");
        session::delete('userName');
        return $this->success('退出登录成功', url('index/index'));
    }
}