<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>留言板</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			window.onload=function(){
				var face=document.getElementById("face");
				var img1=document.getElementById("img1");
				face.onchange=function(){
					img1.src="face/"+this.value;
				}
			}
		</script>
	</head>
	<body>
		<div id="caption">
			<div>公司内部留言板</div>
			<a href="login.php">管理员登录</a>
		</div>
		<?php if($_SESSION['login']=="success"){ ?>
			<p>欢迎管理员&lt;<?php echo $_SESSION['adminName']; ?>&gt;进入留言板！</p>
		<?php } ?>
		<div id="leavemessage">
			<form action="leavemessage.php" method="post">
				发帖人昵称:<input type="text" name="author" type="text" id="author" autocomplete="off">
				头像:<select id="face" name="face">
					<?php for($i=1;$i<=42;$i++){ ?>
						<option value="<?php echo $i.".gif" ?>"><?php echo $i.".gif" ?></option>
					<?php } ?>
					</select>
				<img id="img1" src="face/1.gif">
				<br>
				标题:<input type="text" name="title" autocomplete="off"><br>
				<textarea name="content" rows="10" cols="40"></textarea>
				<input type="submit" name="submit" value="发布" id="submit1">
			</form>
			
			<?php if($_SESSION['login']=='success'){ ?>
				|<a href="loginout.php">管理员注销</a>
			<?php } ?>
		</div>
		<div id="message">
			<?php
			$page=$_GET['page'];
			if(empty($page)){
				$page=1;
			}
			if($page<1){
				$page=1;
			}
			include("conn.php");
			$rs=mysql_query("select * from message order by addTime asc");
			//获得总的记录数
			$rscount=mysql_num_rows($rs); 
			//根据总的记录数算出总页数
			if($rscount%5==0){
				$pagecount=$rscount/5;
			}else{
				$pagecount=ceil($rscount/5);
			}
			//$page不能大于总页数
			if($page>=$pagecount){
				$page=$pagecount;
			}
			//控制指针进行跳转
			mysql_data_seek($rs,($page-1)*5);
			for($i=1;$i<=5;$i++){
				if($info=mysql_fetch_array($rs)){
			?>
			<ul>
				<li class="one"><?php echo $info['messageId']; ?>楼</li>
				<li class="two">
					<img src="face/<?php echo $info['face'] ?>">
					<span><?php echo $info['author']; ?></span>
				</li>
				<li class="three">
					标题:<?php echo $info['title']; ?>
				</li>
				<li class="four">
					内容:<?php echo $info['content']; ?>
				</li>
				<?php if(!empty($info['reply'])){ ?>
					<li class="five">
						管理员回复:<?php echo $info['reply']; ?>
					</li>
				<?php } ?>
				<li class="six"><?php echo $info['addTime']; ?></li>
				<?php if($_SESSION['login']=="success"){ ?>
					<li>
						<a href="replymessage.php?messageId=<?php echo $info['messageId']; ?>">管理员回复</a>
						<a href="deletemessage.php?messageId=<?php echo $info['messageId']; ?>">删除留言</a>
					</li>
					
				<?php } } ?>
			</ul>
			<?php } ?>
			<form action="index.php" method="get" id="footer">
				<a href="index.php?page=<?php echo 1; ?>">首页</a>
				<a href="index.php?page=<?php echo $page-1; ?>">上一页</a>
				<a href="index.php?page=<?php echo $page+1; ?>">下一页</a>
				<a href="index.php?page=<?php echo $pagecount; ?>">尾页</a>
				<input type="text" name="page" size="3" maxlength="4">
				<input type="submit" name="submit" value="跳转&gt;&gt;" autocomplete="off">
				<br>
				<!-- 页码数 -->
			<?php $pn=$_GET["pn"];
				if(empty($pn)){
					$pn=1;
				}
				if($pn<=5){
					$pn=5;
				}
				$j=$pn;
			?>
			<?php for($pn=$pn-4;$pn<=$j+5;$pn++){  
				if($pn>$pagecount){
					$pn=$pagecount;
					break;
				}
			?>         
			<a href="index.php?page=<?php echo $pn;  ?>&pn=<?php echo $pn; ?>"><?php echo $pn; ?></a>&nbsp;
			<?php } ?>
			</form>
		</div>
	</body>
</html>
