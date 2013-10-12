<?php
	
    $img_name = md5(uniqid("yigui")); //设置随机
    //获取文件后缀
    $file_houzhui = substr($_FILES['image']['name'],strripos($_FILES['image']['name'],"."));
    move_uploaded_file($_FILES['image']['tmp_name'],"../image/" . $img_name . $file_houzhui); 
    //输出图片文件<img>标签
    echo "<img src=\"/image/$img_name$file_houzhui\" width=\"230\" height=\"250\">";
?>