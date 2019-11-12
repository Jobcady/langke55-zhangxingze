<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>回复留言</title>
</head>
<body>
	<?php $messageId=$_GET['messageId']; ?>
	管理员回复:
	<form action="replymessagechuli.php" method="post">
		<textarea name="reply" id="" cols="30" rows="10"></textarea>
		<br>
		<input type="hidden" name="messageId" value="<?php echo $messageId; ?>">
		<input type="submit" name="submit" value="管理员回复">
	</form>
</body>
</html>