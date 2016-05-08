<?php
session_start();


$text = '';

if (! isset($_SESSION['chatUser']))
{
	header('location: ./index.php');
	die(0);
}
else
{
	$user = $_SESSION['chatUser'];

	if (isset($_GET['submit']))
	{
		$text = strip_tags($_POST['message']);
		if (strlen($text) <= 250 and $text != '' and strlen(trim($str)) == 0)
		{
			//file_put_contents('./messages.txt', $user . ' - ' . $text . '<br><br>', FILE_APPEND);

			$text = wordwrap($text, 50, "-<br>", true);

			$fileContents = file_get_contents($file);

			file_put_contents('./messages.txt', date('h:i:s A') . ' - ' . $user . ' - ' . $text . '<br><br>' . file_get_contents('./messages.txt'), LOCK_EX);
			header('location: ./chat.php');
			die(0);
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Chaos Webs Chat</title>
	<link rel='stylesheet' href='./theme.min.css'>
</head>
<body>
	<h1 class='center' id='title'>Chaos Webs Chatroom</h1>

	<div id='messageArea'>
		<iframe src='./messages.php' id='messages'></iframe>
	</div>
	<div class='center' id='enter'>
		<br>
		<form method='post' action='./chat.php?submit=true'>
		<span style='font-family: sans-serif;'>Message:</span> <input type='text' name='message' placeholder='Enter Message:' maxlength='250' autocomplete='off'>
		<br><br>
		<input type='submit' value='Send' style=''>
		</form>
	</div>
</body>
</html>