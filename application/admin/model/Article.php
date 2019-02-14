<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class Article extends Model{
    public $table = "article";
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /*
     * 查询文章列表
     * */
    public function showList($where = [], $field = "*", $order = "id desc")
    {
        return Db::name($this->table)->field($field)->where($where)->order($order)->paginate(10);
    }

    /*
     * 查询单条
     * */
    public function show($where = [], $field = "*", $order = "id desc")
    {
        return Db::name($this->table)->field($field)->where($where)->order($order)->find();
    }

    /*
     * 更新文章
     * */
    public function edit($condition = [],$where = [])
    {
        return Db::name($this->table)->where($where)->update($condition);
    }

    /*
     * 新增文章
     * */
    public function add($condition = [])
    {
        return Db::name($this->table)->insert($condition);
    }

    /*
     * 删除文章
     * */
    public function delete($where = [])
    {
        return Db::name($this->table)->where($where)->delete();
    }
}
?>