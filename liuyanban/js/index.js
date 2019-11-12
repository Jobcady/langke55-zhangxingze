$(function(){
	// 特效
	$("#login").click(function(){
		// 遮罩层
		$(".login,.mask-layer").show();
	});
	$("#span1").click(function(){
		$(".login,.mask-layer").hide();
	})

	//显示数据库中所有留言
	$.ajax({
			url:"php/show.php",//从数据库中获得留言
			type:"POST",
			cache:false,
			// contentType:"application/json",
			dataType:"json",
			success:function(data){
				console.log(data);
				// 遍历js对象
				for(var i=0;i<data.data.length;i++){
						$("<li></li>").appendTo("body").html(data.data[i]["author"]);
						$("<li></li>").appendTo("body").html(data.data[i]["title"]);
						$("<li></li>").appendTo("body").html(data.data[i]["content"]);
						$("<li></li>").appendTo("body").html(data.data[i]["face"]);
						$("<li></li>").appendTo("body").html(data.data[i]["addTime"]).addClass("li4");
						$("<li></li>").appendTo(".li4").val(data.data[i]["messageId"]).addClass("li5");
					$("<ul>").appendTo("body");
					$("<br>");
				}
			}
		  });
	// 将留言存储到数据库中
	$("#bt1").click(function(){
		// 当留言框不为空时
			if($("#author").val()!="" && $("#title").val()!="" && $("#content").val()!=""){
				var formdata=new FormData(reg);//一句话实现表单序列化  但是一定要写在点击事件里面
				$.ajax({
					url:"php/insert.php",
					type:"POST",
					processData:false,
					contentType:false,
					data:formdata,
					dataType:"json",
					success:function(data){
						$("p:eq(0)").html(data.msg);
						if(data.status=="20001"){
							// 将新增的留言显示出来
							$.ajax({
									url:"php/show.php",//从数据库中获得留言
									type:"POST",
									cache:false,
									// contentType:"application/json",
									dataType:"json",
									success:function(data){
										console.log(data);
										// 遍历js对象———————将新增的留言显示出来 
										for(var i=data.data.length-1;i<data.data.length;i++){
												$("<li></li>").appendTo("body").html(data.data[i]["author"]);
												$("<li></li>").appendTo("body").html(data.data[i]["title"]);
												$("<li></li>").appendTo("body").html(data.data[i]["content"]);
												$("<li></li>").appendTo("body").html(data.data[i]["face"]);
												$("<li></li>").appendTo("body").html(data.data[i]["addTime"]).addClass("li4");
												$("<li></li>").appendTo(".li4").val(data.data[i]["messageId"]).addClass("li5");
											$("<ul>").appendTo("body");
											$("<br>");
										}
									}
								  });
						};
					}
				})
				
				
			}else{
				$("#p1").html("请正确填写留言框！");//留言框为空时报错
			}
	});
	
	// 管理员登录
	$("#bt2").click(function(){
		$.ajax({
			url:"login.php",
			type:"POST",
			contentType:"application/josn",
			data:JSON.stringify({userName:$("#userName").val(),pwd:$("#pwd").val()}),
			dataType:"json",
			success:function(data){
				if(data.status=="10001"){
					$(".login,.mask-layer").hide();//登陆成功隐藏遮罩层
					// 管理员回复和删除功能
					$('.span1').appendTo("ul").html("回复留言");
					$('.span2').appendTo("ul").html("删除留言");
					// 利用cookie进行登录验证，欢迎管理员进入管理系统
					$.getCookie=getCookie;
					window.$=$;
					function getCookie($name){
						  var data=document.cookie;
						  var dataArray=data.split("; ");
						for(var i=0;i<dataArray.length;i++){
							var varName=dataArray[i].split("=");
							  if(varName[0]==$name){
								 return decodeURI(varName[1]);
							  }
					   }
					 };
					if($.getCookie(hex_md5("login"))==hex_md5("success"+$.getCookie("userName")+$.getCookie("sessionId"))){
										$("#login").html("欢迎"+$.getCookie("userName")+"进入管理系统");
					  }else{
						  $("#login").html("管理员登录");
					  };
				}else{
					$("#tips").html(data.msg);
				}
			}
		})
	});
	// 管理员注销
	$("#loginout").click(function(){
		$.ajax({
			url:"loginout.php",
			type:"POST",
			success:function(data){
				location.href="index.html";//刷新页面，怎么才能不刷新页面就显示
			}
		})
	});
	// 回复留言 .span1
	$(".span1").click(function(){
		$(".login2,.mask-layer").show();
		// 点击回复按钮时
		$("button").click(function(){
			$(".login2,.mask-layer").hide();
				// 将留言插入到数据库中并显示
				
		})
	})
})