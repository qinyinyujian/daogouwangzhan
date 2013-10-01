<?php require 'header.php'; ?>
<script src="http://127.0.0.1/jq-reg.js"></script>
<form action="reg1.php" method="post"> 
	<div class="content_r">
		邮箱账户:<input type="text" id="email" name="email"/>
		<div class="box_c">
			<!-- 预留验证信息 -->
		</div>
	</div> 
	<div class="content_r">用户昵称:<input type="text" id="user" name="user"/>
		<div class="box_c">
			<!-- 预留验证信息 -->
		</div>
	</div> 
	<div class="content_r">登陆密码:<input type="password" id="pass" name="pass"/>
		<div class="box_c">
			<!-- 预留验证信息 -->
		</div>
	</div> 
	<div class="content_r">确认密码:<input type="password" id="checkpass" name="checkpass"/>
		<div class="box_c">
			<!-- 预留验证信息 -->
		</div>
	</div> 
	<input type="submit" value="提交"/>
</form>
<?php require 'footer.php';?>
