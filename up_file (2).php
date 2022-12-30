<?php
// MuX云切片
if ($_FILES["file"]["error"] > 0)
{
    $arr = array("code"=>"100","msg"=>"404 not found");
}
else
{
    $path = "m3u8"; //存储目录

    // 判断当前目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777

        if (!file_exists($path))
        {
            mkdir($path,0777,true);
        }
       
        if(end(explode(".", $_FILES["file"]["name"])) == 'm3u8') {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "$path/" . $_FILES["file"]["name"]);
            $arr = array("code"=>"200","url"=>"https://1-1307294914.cos.ap-nanjing.myqcloud.com/". $path ."/" . $_FILES["file"]["name"]); 
        }else{
            $arr = array("code"=>"100","msg"=>"404  not found"); 
        }
}

exit(json_encode($arr));