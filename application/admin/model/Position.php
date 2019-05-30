<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Position extends Model
{
    public $table="position";

    /*
     * 查询类别列表
     * */
    public function showList($where = array(), $field = "*",$order='posid desc')
    {
        return Db::table($this->table)->field($field)->where($where)->order($order)->select();
    }

    /*
     * 查询类别列表
     * */
    public function showList1($where = array(), $field = "*",$order='posid desc')
    {
        return Db::table($this->table)->field($field)->where($where)->order($order)->paginate(10);
    }

    /*
     * 查询单条类别
     * */
    public function show($where = [], $field = "*")
    {
        return Db::table($this->table)->field($field)->where($where)->find();
    }

    /*
     * 添加类别
     * */
    public function add($condition = [])
    {
        return Db::table($this->table)->insert($condition);
    }

    /*
     * 修改类别
     * */
    public function edit($condition = [], $where = [])
    {
        return Db::table($this->table)->where($where)->update($condition);
    }

    /*
     * 删除类别
     * */
    public function delete($where = [])
    {
        return Db::table($this->table)->where($where)->delete();
    }
}
?>