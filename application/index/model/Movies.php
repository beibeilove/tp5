<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Movies extends Model
{
    protected $table = "movies";

    public function showList($where=[], $field='*', $order='id desc') {
        return Db::table($this->table)->field($field)->where($where)->order($order)->paginate(10);
    }
}
?>