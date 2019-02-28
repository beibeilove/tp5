<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
class Movies extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    public function add()
    {
        $data = model("Position")->showList();
        $this->assign("data",$data);
        return view("add");
    }
    public function addArticle()
    {
        $condition = [];
        $request = Request::instance();
        $requestData = $request->post();
        // 影片标题
        if(empty($requestData['title'])){
            $this->error("影片标题不能为空","movies/add");
        }else{
            $condition['title'] = $requestData['title'];
        }
        // 影片描述
        if(empty($requestData['desc'])){
            $this->error("影片描述不能为空","movies/add");
        }else{
            $condition['desc'] = $requestData['desc'];
        }
        // 影片导演
        if(empty($requestData['director'])){
            $this->error("影片导演不能为空","movies/add");
        }else{
            $condition['director'] = $requestData['director'];
        }
        // 影片演员
        if(empty($requestData['actor'])){
            $this->error("影片演员不能为空","movies/add");
        }else{
            $condition['actor'] = $requestData['actor'];
        }
        // 影片来源
        if(empty($requestData['copyfrom'])){
            $this->error("影片来源不能为空","movies/add");
        }else{
            $condition['copyfrom'] = $requestData['copyfrom'];
        }
        // 影片上映时间
        if(empty($requestData['releaseTime'])){
            $this->error("影片标题不能为空","movies/add");
        }else{
            $condition['releaseTime'] = $requestData['releaseTime'];
        }
        // 影片内容
        if(empty($requestData['content'])){
            $this->error("影片内容不能为空","movies/add");
        }else{
            $condition['content'] = $requestData['content'];
        }
        // 影片图片
        if(empty($requestData['imgurl'])){
            $this->error("影片图片不能为空","movies/add");
        }else{
            $condition['imgurl'] = $requestData['imgurl'];
        }
        // 影片外链
        if(empty($requestData['linkurl'])){
            $this->error("影片外链不能为空","movies/add");
        }else{
            $condition['linkurl'] = $requestData['linkurl'];
        }
        $condition['inputtime'] = time();
        $condition['updatetime'] = time();

        $data = model("movies")->add($condition);
        if(empty($data)){
            $this->error("新增影片失败","movies/add");
        }else{
            var_dump($data);
            $this->success("新增影片成功","movies/show");
        }
    }

    public function show()
    {
        $where = "1=1";
        $searcharr = [];
        $request = Request::instance()->post();
        //查询条件
        // 标题
        if(!empty($request['title'])){
            $title = $request['title'];
            $searcharr['title'] = $title;
            $where.=" and title like '%$title%'";
        }else{
            $searcharr['title'] = "";
        }
        // 作者
        if(!empty($request['director'])){
            $director = $request['director'];
            $searcharr['director'] = $director;
            $where.=" and director like '%$director%'";
        }else{
            $searcharr['director'] = "";
        }

        $data = model("movies")->showList($where);
        var_dump($data);

        $obj=null;
        $obj1=null;
        foreach ($data as $k =>$v){
            $obj[]=$data[$k];
        }
//        foreach ($obj as $value){
//            $arr =explode(",",$value['type']);
//            $value['typename'] = $this->typeChange($arr);
//            $obj1[]=$value;
//        }
        $this->assign("searcharr",$searcharr);
        $this->assign("data",$data);
        return view("show");
    }
    // 编辑
    public function editArticle()
    {
        $where = [];
        $type = [];
        $data = model("Position")->showList();
        $request=Request::instance()->get();
        if(empty($request['id'])){
            $this->error("参数错误","movies/show");
        }else{
            $where['id'] = $request['id'];
        }
        $content = model("movies")->show($where);
        if(empty($content)){
            $this->error("内容有误","movies/show");
        }

        if(!empty($content['type'])){
            $type = explode(",",$content['type']);
        }
        $this->assign("data",$data);
        $this->assign("type",$type);
        $this->assign("content",$content);
        return view("edit");
    }
    // 编辑提交
    public function updateArticle()
    {
        $condition = [];
        $where = [];
        $request = Request::instance();
        $requestData = $request->post();
        // 影片id
        if(empty($requestData['id'])){
            $this->error("参数错误","movies/edit");
        }else{
            $where['id'] = $requestData['id'];
        }
        // 影片标题
        if(empty($requestData['title'])){
            $this->error("影片标题不能为空","movies/edit");
        }else{
            $condition['title'] = $requestData['title'];
        }
        // 影片导演
        if(empty($requestData['director'])){
            $this->error("影片导演不能为空","movies/add");
        }else{
            $condition['director'] = $requestData['director'];
        }
        // 影片来源
        if(empty($requestData['copyfrom'])){
            $this->error("影片来源不能为空","movies/add");
        }else{
            $condition['copyfrom'] = $requestData['copyfrom'];
        }
        // 影片描述
        if(empty($requestData['desc'])){
            $this->error("影片描述不能为空","movies/add");
        }else{
            $condition['desc'] = $requestData['desc'];
        }
        // 影片内容
        if(empty($requestData['content'])){
            $this->error("影片内容不能为空","movies/edit");
        }else{
            $condition['content'] = $requestData['content'];
        }
        // 影片图片
        if(empty($requestData['imgurl'])){
            $this->error("影片图片不能为空","movies/add");
        }else{
            $condition['imgurl'] = $requestData['imgurl'];
        }
        // 影片类型
        if(empty($requestData['position'])){
            $this->error("影片类型不能为空","movies/edit");
        }else{
            $condition['type'] = '';
            foreach ($requestData['position'] as $v){
                $condition['type'].= $v.",";
            }
            $condition['type'] = substr($condition['type'],0,strlen($condition['type'])-1);
        }
        // 影片外链
        if(empty($requestData['linkurl'])){
            $this->error("影片外链不能为空","movies/add");
        }else{
            $condition['linkurl'] = $requestData['linkurl'];
        }
        $condition['updatetime'] = time();

        $data = model("movies")->edit($condition,$where);
        if(empty($data)){
            $this->error("修改影片失败","movies/show");
        }else{
            $this->success("修改影片成功","movies/show");
        }
    }
    //查看影片详情
    public function showArticle()
    {
        $where = [];
        $id = Request::instance()->get("id");
        if(empty($id)){
            $this->error("参数错误","movies/show");
        }
        $where['id'] = $id;
        $data = model("movies")->show($where);
        $this->assign("data",$data);
        return view("showDetail");
    }
    //删除
    public function delete(){
        $where = [];
        $id = Request::instance()->get("id");
        if(empty($id)){
            $this->error("参数错误","movies/show");
        }
        $where['id'] = $id;
        $data = model("movies")->delete($where);
        if(empty($data)){
            $this->error("删除失败","movies/show");
        }else{
            $this->success("删除成功","movies/show");
        }
    }

    //上传图片
    public function upload()
    {
        $base64_image_content = Request::instance()->post("imgurl");
        header('Content-type:text/html;charset=utf-8');
//匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $type = $result[2];
            $new_file = "upload/active/img/" . date('Ymd', time()) . "/";
            if (!file_exists($new_file)) {
//检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0777, true);
            }
            $new_file = $new_file . time() . ".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
                $full_file = $_SERVER['HTTP_HOST'].'/tp5/public/'.$new_file;
                return json(['status' => 1, 'msg' => '文件上传成功', 'data' => ['imgurl' => $new_file, 'fullurl' => $full_file]]);
            } else {
                return json(['status' => 2, 'msg' => '文件上传失败']);
            }
        }
    }

    //影片类型判断
    public function typeChange($type)
    {
        $typename = "";
        $data = Db::name("position")->field("posname")->whereIn("posid",$type,"or")->select();
        foreach($data as $value){
            $typename .= $value['posname'].',';
        }
        $typename=substr($typename,0,strlen($typename)-1);
        return $typename;
    }

}
?>