<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Movies extends Model{
    public $table = "movies";
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /*
     * 查询电影列表
     * */
    public function showList($where = [], $field = "*", $order = "a.releaseTime desc")
    {
        return Db::name($this->table)
            ->alias('a')
            ->join('movies_type i','a.id=i.mid','left')
            ->field($field)
            ->where($where)
            ->order($order)
            ->group('i.mid')
            ->paginate(10);
    }

    /*
     * 查询单条
     * */
    public function show($where = [], $field = "*")
    {
        return Db::name($this->table)
            ->alias('a')
            ->join('movies_type i','a.id=i.mid','left')
            ->field($field)
            ->where($where)
            ->group('i.mid')
            ->find();
    }

    /*
     * 更新电影
     * */
    public function edit($condition = [],$where = [])
    {
        return Db::name($this->table)->where($where)->update($condition);
    }

    /*
     * 新增电影
     * */
    public function add($condition = [])
    {
        return Db::name($this->table)->insertGetId($condition);
    }

    /*
     * 删除电影
     * */
    public function delete($where = [])
    {
        return Db::name($this->table)->where($where)->delete();
    }
}
?>