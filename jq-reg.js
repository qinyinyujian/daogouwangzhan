$(document).ready(function() {

// 检测邮箱
	$("#email").blur(function() {
		var mail = /^([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+.[a-zA-Z]{2,4}$/;
		if (!mail.test($("#email").val())) {
			$(this).parents(".content_r").find(".box_c").text("邮箱格式不正确");
		} else {
			$.post("cmail.php",{email:$("#email").val()},function(data) {
  			$("#email").parents(".content_r").find(".box_c").text(data);
			});
		}
	});

//检测用户昵称
	$("#user").blur(function() {
		// 中文必须2个以上、英文3个以上正则表达式
		var x = /^([\u4e00-\u9fa50-9a-zA-Z]{2,7}|[a-zA-Z0-9]{3,16})$/g
		var s = $("#user").val();
		if (!x.test(s)){
			$(this).parents(".content_r").find(".box_c").text("需要至少3个字符以上");
		} else {
			$.post("cusername.php",{user:$("#user").val()},function(data) {
  			$("#user").parents(".content_r").find(".box_c").text(data);
			});
		}
	});

// 检测密码
	$("#pass").blur(function(){
		var p = $("#pass").val().length;
		if (p <=5 || p >32 ){
			$(this).parents(".content_r").find(".box_c").text("密码至少6-32位");
		} else {
			$(this).parents(".content_r").find(".box_c").text("输入正确");
		}
	});

// 检测密码相等
	$("#checkpass").blur(function(){
		if ($("#checkpass").val().length <=5 || $("#checkpass").val().length > 32 ) {
			$(this).parents(".content_r").find(".box_c").text("密码至少6-32位");
		} else if ($("#pass").val() != $("#checkpass").val()) {
			$(this).parents(".content_r").find(".box_c").text("两个密码不一样");
		} else {
			$(this).parents(".content_r").find(".box_c").text("输入正确");
		}
	});

//检测提交表单
	$("form").submit(function() {
		var mail = /^([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+.[a-zA-Z]{2,4}$/;
		var user = /^([\u4e00-\u9fa50-9a-zA-Z]{2,7}|[a-zA-Z0-9]{3,16})$/g
		var pass = /\S{6}/
		if (!mail.test($("#email").val())) {
			return false;
		}

		else if (!user.test($("#user").val())) {
			return false;
		} 

		else if (!pass.test($("#pass").val())) {
			return false;
		} 

		else if (!pass.test($("#checkpass").val())) {
			return false;
		}

		else if ($("#pass").val() != $("#checkpass").val()) {
			return false;
		} 
	});

});