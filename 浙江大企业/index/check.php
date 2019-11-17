<?php
session_start();
$info=json_decode(file_get_contents('php://input'),true);
$userName=$info['input1'];
$pwd=$info['input2'];

if($userName=="tom" and $pwd=="123"){
  setcookie("sessionId",session_id(),time()+600);
  // 注:不开session_id也行,session_id="sfjksajlf"将其换成一堆字符串/
  setcookie("userName",$userName,time()+600);
  // time()+600过期时间,600s
  setcookie(md5("login"),md5("success".$userName.session_id()),time()+600);

  echo '{"status":"1001","msg":"success"}';	
}else{
	echo '{"status":"3001","msg":"用户名或密码错误！"}';
}
?>