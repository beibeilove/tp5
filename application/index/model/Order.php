<?php
namespace app\index\model;
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
        return Db::name($this->table)->field('*')->where($where)->select();
    }

    /*
     * 查询订单详情
     */
    public function showDetail($where=[]){
        return Db::name($this->table)->field('*')->where($where)->find();
    }
}
?>