<?php 
session_start();
header("content-type:text/html;charset=utf-8");
if($_SESSION['login']=="success"){
	$messageId=$_GET['messageId'];
	include("conn.php");
	$flag=mysql_query("delete from message where messageId='$messageId'");
	if($flag){
		header("location:index.php");
	}else{
		echo '<script>alert("删除失败");</script>';
	}
}else{
	header("location:error.php");
}
?>