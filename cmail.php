<?php
// 检查email是否给注册
require 'lib/config.php';
$db = new mysqli($sqln,$sqlu,$sqlp,$sqld) or die("Error in the consult.." . mysqli_error($db));
$query = "SELECT user_email FROM `user` WHERE user_email = '$_POST[email]' ";
$result = $db->query($query) or die("连接错误" . mysqli_error($db));
$db->close();
if ($result->num_rows == 1){
	die ("邮件地址已被注册！");
} else { die ("邮件地址可以注册！"); }
?>