<?php
require 'lib/config.php';
$y        = "1"; // 用来标记注册表单提交的数据是不是有问题
//处理email

$ce = "/^([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+.[a-zA-Z]{2,4}$/";

if (!preg_match($ce, "$_POST[email]")){
	die ("邮箱地址错误");
	$y = "0";
}

$db = new mysqli(sqln,sqlu,sqlp,sqld) or die("连接错误" . mysqli_error($db));
$query = "SELECT user_email FROM `user` WHERE user_email = '$_POST[email]' ";
$result = $db->query($query) or die("连接错误" . mysqli_error($db));
$db->close();
if ($result->num_rows == 1){
	die ("邮箱已存在");
	$y = "0";
} 

//处理用户昵称
$cn = "/^([\x80-\xff0-9a-zA-Z]{2,7}|[a-zA-Z0-9]{3,16})$/";
if (!preg_match($cn, "$_POST[user]")){
	die("用户昵称有错误");
	$y= "0";
}

$db = new mysqli(sqln,sqlu,sqlp,sqld) or die("连接错误" . mysqli_error($db));
$query = "SELECT user_email FROM `user` WHERE user_name = '$_POST[user]' ";
$result = $db->query($query) or die("连接错误" . mysqli_error($db));
$db->close();
if ($result->num_rows == 1){
	die ("昵称已存在");
	$y = "0";
} 

//处理密码
$pass = md5(crypt(md5("$_POST[pass]"),"$_POST[pass]"));

//帐号密码入库
$rt = date("Y-m-d");
if ($y="1"){
	$db = new mysqli(sqln,sqlu,sqlp,sqld) or die("连接错误" . mysqli_error($db));
	$query = "INSERT INTO user(user_email,
				user_name,
				user_pass,
				regtime)
				VALUES('$_POST[email]',
				'$_POST[user]',
				'$pass',
				'$rt')";
	$db->query($query) or die("连接错误" . mysqli_error($db));
	$db->close();
} 
?>