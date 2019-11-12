<?php
header("content-type:text/html;charset=utf-8");
$author=$_POST['author'];
$title=$_POST['title'];
$content=$_POST['content'];
$face=$_POST['face'];
include("conn.php");
if($author!='' and $title!='' and $content!=''){
	$flag=mysql_query("insert into message(author,title,content,face,addTime) values('$author','$title','$content','$face',now())");
	if($flag){
		header("location:index.php");
	}else{
		echo '<script>alert("发布留言失败");history.go(-1)</script>';
	}
}else{
	echo '<script>alert("昵称、标题和内容不能为空！");history.go(-1)</script>';
}
?>