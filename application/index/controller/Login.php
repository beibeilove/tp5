<?php
namespace app\index\controller;

use think\Db;
use think\Controller;
use think\helper\hash\Md5;
use \think\Request;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        $request = Request::instance();
        $redirectUrl = $request->header();
        var_dump($redirectUrl['referer']);
        if (!empty($redirectUrl['referer'])) {
            Session::set('redirectUrl', $redirectUrl['referer']);
        }
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
        $condition['terminal'] = 0;
        $data = model('User')->show($condition);
        if(empty($data)){
            return $this->error('用户名或密码不正确', url('Login/index'));
        }else{
            Session::set("frontUserId","1");
            Session::set('frontUsername',$condition['username']);
            Session::set('frontId',$data['id']);
            $redirectUrl = Session::get('redirectUrl');
            return $this->success('登录成功', $redirectUrl);
        }
    }

    //退出登录
    public function logout()
    {
        session::delete("frontUserId");
        session::delete('frontUsername');
        session::delete('frontId');
        return $this->success('退出登录成功', url('index/index'));
    }
}