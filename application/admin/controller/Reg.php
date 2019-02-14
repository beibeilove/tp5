<?php
namespace app\admin\controller;

use \think\Controller;
use think\helper\hash\Md5;
use \think\Request;
use \think\Db;
class Reg extends Controller
{
    public function index()
    {
        return view("reg");
    }
    public function reg()
    {
        $condition = [];
        $request = Request::instance();
        $username = $request->post("username");
        $password = $request->post("password");
        if(empty($username)){
            $this->error("请填写用户名", url('reg/index'));
        }
        if($this->regUser() == 'succ'){
            $this->error("用户名已存在",url("Reg/index"));
        }else{
            $condition['username'] = $username;
            $condition['password'] = Md5($password);
            $data = model("User")->add($condition);
            if(!empty($data)){
                $this->success("用户名添加成功",url("Login/index"));
            }else{
                $this->error("用户名添加失败",url("Reg/index"));
            }
        }
    }

    //用户名验证
    public function regUser()
    {
        $request = Request::instance();
        $username = $request->post("username");
        if(!empty($username)){
            $condition['username'] = $username;
            $data=model('User')->show($condition);
            if(!empty($data)){
                return 'succ';
            }else{
                return 'error';
            }
        }
    }
}

?>