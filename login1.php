<?php 
require 'lib/config.php';
require 'authc.php';
	if ($GLOBALS["dlzt"] == '1') {
		echo "<p> 登陆成功 </p>";
	}

    $pass = md5(crypt(md5("$_POST[pass]"),"$_POST[pass]"));
	$db = new mysqli($sqln,$sqlu,$sqlp,$sqld) or die("Error in the consult.." . mysqli_error($db));
	$query = "SELECT user_email,user_pass 
			  FROM `user` 
			  WHERE user_email = '$_POST[email]'
			  AND user_pass =  '$pass'";
	$result = $db->query($query); // or die("Error in the consult.." . mysqli_error($db));
	

	if ($result->num_rows == 1){
		$key = crypt("$_POST[email]","$_POST[email]"."$_POST[pass]");
		$db->query("UPDATE `user` 
					SET `miyue` = '$key' 
					WHERE user_email='$_POST[email]'") or die("连接错误" . mysqli_error($db));
		$db->close();
		$jm = new authc();
		$user = $jm->encode($_POST['email'],$key);
		$pwd = $jm->encode($pass,$key);
		setcookie("user","$user",time()+86400*7,"/");
		setcookie("key","$pwd",time()+86400*7,"/");
		$GLOBALS["dlzt"]="1"; //设置登陆状态1登陆,0未登录
		echo "<p> 登陆成功 </p>";
		}
		else { echo "<p> 帐号或者密码输入错误 </p>"; }
	
?>
