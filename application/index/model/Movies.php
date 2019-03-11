<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Movies extends Model
{
    protected $table = "movies";

    /*
     * 查询电影列表
     * type 9 即将上线  8 正在热映
     */
    public function showList($where = [], $field = "*", $order = "a.id desc")
    {
        return Db::name($this->table)
            ->alias('a')
            ->join('movies_type i','a.id=i.mid','left')
            ->field($field)
            ->where($where)
            ->order($order)
            ->group('i.mid')
            ->paginate(14);
    }

    /*
     * 查询电影列表
     * type 9 即将上线  8 正在热映
     */
    public function showListName($where = [], $field = "*", $order = "a.id desc")
    {
        return Db::name($this->table)
            ->alias('a')
            ->join('movies_type i','a.id=i.mid','left')
            ->join('position j','i.pid=j.posid','left')
            ->field($field)
            ->where($where)
            ->order($order)
            ->group('i.mid')
            ->paginate(10);
    }

    /*
     * 查询电影详情
     */
    public function showListDetail($where = [], $field = "*", $order = "a.id desc")
    {
        return Db::name($this->table)
            ->alias('a')
            ->join('movies_type i','a.id=i.mid','left')
            ->join('position j','i.pid=j.posid','left')
            ->field($field)
            ->where($where)
            ->order($order)
            ->group('i.mid')
            ->find();
    }

}
?>