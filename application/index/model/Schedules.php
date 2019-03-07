<?php
namespace app\index\model;
use think\Db;
use think\Model;
class Schedules extends Model{
    public $table = "schedules";
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /*
     * 查询电影排期列表
     * */
    public function showList($where = [], $order = "id desc")
    {
        return Db::name($this->table)
            ->where($where)
            ->order($order)
            ->select();
    }

    /*
     * 查询单条电影排期
     * */
    public function show($where = [], $field = "*")
    {
        return Db::name('movies')
            ->alias('a')
            ->join($this->table.' i','a.id=i.mid','inner')
            ->field($field)
            ->where($where)
            ->group('i.mid')
            ->find();
    }

    /*
     * 更新电影排期
     * */
    public function edit($condition = [],$where = [])
    {
        return Db::name($this->table)->where($where)->update($condition);
    }

    /*
     * 新增电影排期
     * */
    public function add($condition = [])
    {
        return Db::name($this->table)->insertGetId($condition);
    }

    /*
     * 删除电影排期
     * */
    public function delete($where = [])
    {
        return Db::name($this->table)->where($where)->delete();
    }
}
?>