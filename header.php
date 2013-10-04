<?php 
require 'lib/config.php';
require 'authc.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $wwwtitle;?></title>
<!-- SEO -->
<meta name="description" content="我的衣柜是一个分享和记录自己想要买或者已经拥有的服饰和鞋子。">
<meta name="keywords" content="衣服,鞋子,首饰,帽子">
<LINK rel="stylesheet" type="text/css" href="top.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
</head>

<body>
	<!-- 顶端 -->
	<div class="top">
		<!-- logo备用 -->
		<img alt="">
		<!-- 检测登陆状态 -->
		<div class="user">
<?php 

	if (isset($_COOKIE['name'])) {
		echo "$_COOKIE[name]";
	}
	else { 
		echo "登陆";
	}
	
?>
  	</div>
		</div>