<?php
namespace app\admin\model;
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
    public function showList($where = [], $order = "time and date desc")
    {
        return Db::name($this->table)
            ->where($where)
            ->order($order)
            ->paginate(10);
    }

    /*
     * 查询单条电影排期
     * */
    public function show($where = [], $order = "time and date desc")
    {
        return Db::name($this->table)
            ->where($where)
            ->order($order)
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