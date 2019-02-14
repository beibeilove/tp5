<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class User extends Model
{
    protected $table = "user";

    /*
     * 查询用户列表
     * */
    public function showList($where = [], $field = "*", $order = "id desc")
    {
        return Db::table($this->table)->field($field)->where($where)->order($order)->paginate(10);
    }

    /*
     *查询单个用户
     * */
    public function show($where = [], $field = "*")
    {
        return Db::table($this->table)->field($field)->where($where)->find();
    }

    /*
     * 新增用户
     * */
    public function add($condition = [])
    {
        return Db::table($this->table)->insert($condition);
    }

    /*
     * 删除某个用户
     * */
    public function delete($where = [])
    {
        return Db::table($this->table)->where($where)->delete();
    }

    /*
     * 修改某个用户
     * */
    public function edit($where = [], $condition = [])
    {
        return Db::table($this->table)->where($where)->update($condition);
    }
}
?>