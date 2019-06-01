<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Session;
class Order extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /**
     * @return \think\response\View
     * 首页
     */
    public function index(){
        return view('index');
    }
    /*
     * 生成订单
     */
    public function add()
    {
        $condition = [];
        $where = [];
        $condition1 = [];
        $where1 = [];
        $request = Request::instance()->post();
        if(!Session::get('frontUserId')){
            return json(['data'=>'未登录','code'=>401]);
        }else{
            $condition['uid'] = Session::get('frontId');
        }
//        $condition['uid'] = $request['frontId'];
        $condition['id'] = date("Ymd") . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $condition['qrcode'] = 123;
        $condition['createTime'] = time();
        $condition['updateTime'] = time();

        if(empty($request['sid'])){
            return json(['data'=>'场次为空','code'=>20001]);
        }else{
            $condition['sid'] = $request['sid'];
            $where['id'] = $request['sid'];
            $where1['i.id'] = $request['sid'];
        }
        if(empty($request['mName'])){
            return json(['data'=>'影片名称为空','code'=>20001]);
        }else{
            $condition['mName'] = $request['mName'];
        }
        if(empty($request['seat'])){
                return json(['data'=>'未选定座位','code'=>20001]);
        }else{
            $condition['seatNum'] = $request['seat'];
        }
        if(empty($request['ticketNum'])){
            return json(['data'=>'票数为空','code'=>20001]);
        }else{
            $condition['ticketNum'] = $request['ticketNum'];
        }
        if(empty($request['price'])){
            return json(['data'=>'票价为空','code'=>20001]);
        }else{
            $condition['price'] = $request['price'];
        }
        $condition['status'] = $request['status'];
        $data=model('Order')->add($condition);
        if ($data) {
            $code = 200;
        } else {
            $code = 20001;
        }
        $data = [
            'code' => $code,
            'data' => $condition
        ];
        return json($data);
    }

    /*
     * 查询订单
     */
    public function showDetail(){
        $where = [];
        $request = Request::instance()->get();
        if(empty($request['id'])){
            return json(['data'=>'订单不存在','code'=>20001]);
        }else{
            $where['id'] = $request['id'];
        }
        $where['status'] = 1;
        $data = model('Order')->showDetail($where);

        if ($data) {
            $code = 200;
        } else {
            $code = 20001;
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];
        return json($data);
    }

    /*
     * 查询订单2
     */
    public function showDetail2(){
        $where = [];
        $request = Request::instance()->get();
        if(empty($request['sid'])){
            return json(['data'=>'场次为空','code'=>20001]);
        }else{
            $where['sid'] = $request['sid'];
        }
        $where['status'] = 2;
        $data = model('Order')->showList($where);

        if ($data) {
            $code = 200;
        } else {
            $code = 20001;
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];
        return json($data);
    }

    /*
     * 查询订单列表
     */
    public function show(){
        $where = [];
        $request = Request::instance()->post();

        $where['uId'] = Session::get('frontId');
        $where['status'] = $request['status'];
        $data = model('Order')->showlist1($where);

        if ($data) {
            $code = 200;
        } else {
            $code = 200;
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];
        return json($data);
    }

    /**
     * 订单支付
     * @return \think\response\Json
     */
    public function orderPay() {
        $where = [];
        $where1=[];
        $condition=[];
        $request = Request::instance()->get();
        if(empty($request['id'])){
            return json(['data'=>'订单无效','code'=>20001]);
        }else{
            $where['id'] = $request['id'];
        }
        $data = model('order')->showDetail($where);
        $where1['i.id'] = $data['sid'];
        $ticketNum=model('schedules')->show($where1,'i.available');

        $condition['available'] = $ticketNum['available']+$data['ticketNum'];
        $update=model('schedules')->edit($condition, ['id' => $data['sid']]);

        $condition1['status'] = 3;
        $update1=model('order')->edit($condition1, $where);
        if ($update && $update1) {
            $code = 200;
        } else {
            $code = 20001;
        }
        $update = [
            'code' => $code,
            'data' => $update1
        ];
        return json($update);
    }

    /*
     * 订单编辑
     */
    public function update() {
        $where = [];
        $where1=[];
        $condition=[];
        $condition1=[];
        $request = Request::instance()->get();
        if(empty($request['id'])){
            return json(['data'=>'订单无效','code'=>20001]);
        }else{
            $where['id'] = $request['id'];
        }
        $data = model('order')->showDetail($where);
        $where1['i.id'] = $data['sid'];
        $ticketNum=model('schedules')->show($where1,'i.available');

        $condition['available'] = $ticketNum['available']-$data['ticketNum'];
        $update=model('schedules')->edit($condition, ['id' => $data['sid']]);

        $condition1['status'] = $request['status'];

        $update1=model('order')->edit($condition1, $where);
        if ($update) {
            $code = 200;
        } else {
            $code = 20001;
        }
        $update = [
            'code' => $code,
            'data' => $update1
        ];
        return json($update);
    }

    /*
     * 订单退订
     */
    public function delete() {
        $where = [];
        $where1=[];
        $condition=[];
        $condition1=[];
        $request = Request::instance()->get();
        if(empty($request['id'])){
            return json(['data'=>'订单无效','code'=>20001]);
        }else{
            $where['id'] = $request['id'];
        }
        $data = model('order')->showDetail($where);
        $where1['i.id'] = $data['sid'];
        $ticketNum=model('schedules')->show($where1,'i.available');

        $condition['available'] = $ticketNum['available']+$data['ticketNum'];
        $update=model('schedules')->edit($condition, ['id' => $data['sid']]);

        $condition1['status'] = $request['status'];

        $update1=model('order')->edit($condition1, $where);
        if ($update) {
            $code = 200;
        } else {
            $code = 20001;
        }
        $update = [
            'code' => $code,
            'data' => $update1
        ];
        return json($update);
    }
}
?>