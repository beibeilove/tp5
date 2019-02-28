$(function() {
    $(".file_add_box input").change(function (e) {
        var imgObj=e.target.files[0];
        var obj={};
        lrz(imgObj)
            .then(function (rst) {
                // 处理成功会执行
                var img = rst;
                $(".input_img").css({"background":"url("+img.base64+") no-repeat center","background-size":"cover"}).html("");
                obj.imgurl=img.base64;
                $.ajax({
                    url:"../movies/upload",
                    type:"post",
                    data:obj,
                    success:function(e){
                        if(e.status==1){
                            $("#imgurl").val(e.data.imgurl)
                        }
                    }
                })
            })
            .catch(function (err) {
                // 处理失败会执行
            })
            .always(function () {
                // 不管是成功失败，都会执行
            });
    });

});