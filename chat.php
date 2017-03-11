<?php
session_start();
date_default_timezone_set('UTC');

$bytes = 12;
if (! isset($_SESSION['CSRFToken']))
{
  $_SESSION['CSRFToken'] = bin2hex(openssl_random_pseudo_bytes($bytes));
}
$CSRFToken = $_SESSION['CSRFToken'];

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
		$text = $_POST['message'];
		if (strlen($text) <= 250 and $text != '' and strlen(trim($str)) == 0)
		{

			$text = wordwrap($text, 50, "-<br>", true);
			$text = strip_tags($text);
			$text = preg_replace(
              "~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
              "<a href=\"\\0\" target=\"_blank\">\\0</a>", 
              $text);

			$fileContents = file_get_contents($file);

			file_put_contents('./messages.txt', date('h:i:s A') . ' - ' . $user . ' - ' . $text . '<br><br>', LOCK_EX . FILE_APPEND);
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
	<h1 class='center' id='title'>Chaos Webs Chat Room</h1>

	<div id='messageArea'>
		<iframe src='./messages.php#scroll' id='messages' sandbox="allow-popups"></iframe>
	</div>
	<div class='center' id='enter'>
		<br>
		<form method='post' action='./chat.php?submit=true'>
		<span style='font-family: sans-serif;'>Message:</span> <input required type='text' name='message' placeholder='Enter Message:' maxlength='250' autocomplete='off'>
		<br><br>
		<input type='hidden' name='csrf' value='<?php echo $CSRFToken; ?>'>
		<input type='submit' value='Send' style=''>
		</form>
	</div>
</body>
</html>
