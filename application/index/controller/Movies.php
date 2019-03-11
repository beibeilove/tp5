<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Movies extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /*
     * 影片列表页
     */
    public function index() {
        /*
         * 正在热映
         */
        $condition = '1=1';
        $data = model('movies')->showListName($condition, 'a.*,group_concat(j.posname) as typename');

        $this->assign('data', $data);
        return view('index');
    }

    /*
     * 影片详情页
     */
    public function detail() {
        $where = [];
        $condition = [];
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/index");
        }else{
            $where['a.id'] = $request['id'];
            $condition['mid'] = $request['id'];
        }
        $condition['date'] = date('Y-m-d');
        $data = model('Movies')->showListDetail($where, '*');
        $schedules = model('Schedules')->showList($condition);
        $this->assign('data', $data);
        $this->assign('schedules', $schedules);
        return view('detail');
    }

    public function getSchedulesList(){
        $where = [];
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/index");
        }else{
            $where['mid'] = $request['id'];
        }

        if(empty($request['date'])){
            $this->error("未选择日期","movies/index");
        }else{
            $where['date'] = $request['date'];
        }
        $data=model('Schedules')->showList($where, 'time asc');
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
}

?>