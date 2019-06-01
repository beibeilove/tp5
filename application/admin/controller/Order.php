<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
class Order extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /*
     * 订单列表
     */
    public function show()
    {
        $where = [];
        $searcharr = [];
        $request = Request::instance()->post();
        //查询条件
        // 订单状态
        if(!empty($request['status'])){
            $status = $request['status'];
            $searcharr['status'] = $status;
            $where['status'] = $status;
        }else{
            $searcharr['status'] = 0;
        }

        $data = model("order")->showList1($where);

        $this->assign("searcharr",$searcharr);
        $this->assign("data",$data);
        return view("show");
    }

    /*
     * 订单退订
     */
    public function delete() {
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

        $condition1['status'] = 0;
        $condition1['updateTime'] = strtotime('now');
        $update1=model('order')->edit($condition1, $where);
        if($update && $update1){
            $this->error("退订成功","Order/show");
        }else{
            $this->success("退订失败","Order/show");
        }
    }
}
?>