<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Position extends Model
{
    public $table="position";

    /*
     * 查询推荐位列表
     * */
    public function showList($where = array(), $field = "*",$order='posid desc')
    {
        return Db::table($this->table)->field($field)->where($where)->order($order)->paginate(15);
    }

    /*
     * 查询单条推荐位
     * */
    public function show($where = [], $field = "*")
    {
        return Db::table($this->table)->field($field)->where($where)->find();
    }

    /*
     * 添加推荐位
     * */
    public function add($condition = [])
    {
        return Db::table($this->table)->insert($condition);
    }

    /*
     * 修改推荐位
     * */
    public function edit($condition = [], $where = [])
    {
        return Db::table($this->table)->where($where)->update($condition);
    }

    /*
     * 删除推荐位
     * */
    public function delete($where = [])
    {
        return Db::table($this->table)->where($where)->delete();
    }
}
?>