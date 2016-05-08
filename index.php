<?php
session_start();
if (isset($_SESSION['chatUser']))
{
	header('location: ./chat.php');
	die(0);
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<title>Chaos Webs Chat</title>
	<link rel='stylesheet' href='./theme.min.css'>
</head>
<body>
	<h1 class='center' id='title'>Chaos Webs Chatroom</h1>
	<p class='center'>Choose a nickname, max 12 chars:</p>
	<div class='center'>
		<form method='post' action='./login.php'>
			<input type='text' placeholder='Nickname' name='nick' maxlength='12'>
			<br><br>
			<input type='submit' value='Enter Chat'>
		</form>
	</div>
</body>
</html>