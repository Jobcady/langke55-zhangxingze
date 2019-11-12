<?php 
session_start();
header("content-type:text/html;charset=utf-8");
if($_SESSION['login']=="success"){
	$reply=$_POST['reply'];
	$messageId=$_POST['messageId'];
	include("conn.php");
	if($reply!=''){
		$flag=mysql_query("update message set reply='$reply' where messageId='$messageId'");
		if($flag){
			header("location:index.php");
		}else{
			echo '<script>alert("回复失败");</script>';
		}
	}else{
		echo '<script>alert("内容不能为空！");history.go(-1);</script>';
	}
	
}else{
	header("location:error.php");
}
?>