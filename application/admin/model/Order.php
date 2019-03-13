<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Order extends Model
{
    protected $table = "order";
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /*
     * 生成订单
     */
    public function add($condition=[]){
        return Db::name($this->table)->insert($condition);
    }

    /*
     * 查询订单
     */
    public function showlist($where=[]){
        return Db::name($this->table)->field('*')->where($where)->paginate(10);
    }

    /*
     * 查询订单1
     */
    public function showlist1($where=[]){
        return Db::name($this->table)
            ->alias('a')
            ->field('*')
            ->join('schedules i', 'a.sid = i.id', 'left')
            ->where($where)
            ->paginate(10);
    }

    /*
     * 查询订单详情
     */
    public function showDetail($where=[]){
        return Db::name($this->table)->field('*')->where($where)->find();
    }

    /*
     * 更新订单
     * */
    public function edit($condition = [],$where = [])
    {
        return Db::name($this->table)->where($where)->update($condition);
    }

}
?>