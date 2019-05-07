<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class MoviesPos extends Model{
    public $table = "movies_type";
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /*
     * 查询电影类别列表
     * */
    public function showList($where = [], $field = "*", $order = "a.id desc")
    {
        return Db::name($this->table)
            ->field($field)
            ->where($where)
            ->order($order);
    }

    /*
     * 新增电影类别
     * */
    public function add($condition = [])
    {
        return Db::name($this->table)->insertGetId($condition);
    }

    /*
     * 删除电影类别
     * */
    public function delete($where = [])
    {
        return Db::name($this->table)->where($where)->delete();
    }
}
?>