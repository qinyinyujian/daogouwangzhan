<?php
require 'lib/config.php';
$db = new mysqli(sqln,sqlu,sqlp,sqld) or die("Error in the consult.." . mysqli_error($db));
$query = "SELECT user_email FROM `user` WHERE user_name = '$_POST[user]' ";
$result = $db->query($query) or die("连接错误" . mysqli_error($db));
$db->close();
if ($result->num_rows == 1){
	die ("昵称给人用啦，换一个吧！");
} else { die ("昵称还没有给人用，赶快注册。"); }
?>