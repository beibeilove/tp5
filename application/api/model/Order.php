<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Order extends Model
{
    public $table = "order";

    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /*
     * 查询电影订单列表
     * */
    public function showList($where = [], $order = "id desc")
    {
        return Db::name($this->table)
            ->where($where)
            ->order($order)
            ->paginate(100);
    }
}
?>